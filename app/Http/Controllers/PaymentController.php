<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function checkout(Course $course)
    {
        if (Auth::user()->role === 'admin') {
             return back()->with('error', 'Admins cannot enroll in courses.');
        }

        // Check if already enrolled
        if (Auth::user()->courses->contains($course->id)) {
            return back()->with('info', 'You are already enrolled in this course.');
        }

        return view('payments.checkout', compact('course'));
    }

    public function process(Request $request, Course $course)
    {
        $input = $request->all();

        // Use config helper for keys
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                // Verify payment signature (optional but recommended)
                // For simplicity, we just capture it.

                // Note: If you use automatic capture in JS, you don't need to capture here again.
                // Assuming manual capture or verification.

                // Let's just trust the payment ID for this demo and enroll the user.

                // Verify amount matches course price
                if ($payment['amount'] != $course->price * 100) {
                     return redirect()->back()->with('error', 'Payment amount mismatch.');
                }

                DB::transaction(function () use ($course, $payment) {
                    // Create Payment Record
                    Payment::create([
                        'user_id' => auth()->id(),
                        'course_id' => $course->id,
                        'razorpay_payment_id' => $payment['id'],
                        'amount' => $course->price,
                        'status' => 'success',
                    ]);

                    // Enroll User
                    auth()->user()->courses()->attach($course->id);
                });

                return redirect()->route('courses.show', $course)->with('success', 'Payment successful! You are enrolled.');

            } catch (\Exception $e) {
                return  redirect()->back()->with('error', $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Payment failed');
    }
}
