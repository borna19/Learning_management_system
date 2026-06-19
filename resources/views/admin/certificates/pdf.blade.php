<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Completion</title>
    <style>
        body {
            font-family: 'Helvetica', serif;
            margin: 0;
            padding: 0;
        }
        .certificate-container {
            width: 100%;
            height: 100%;
            padding: 20px;
            text-align: center;
            border: 10px solid #787878;
            position: relative;
        }
        .inner-border {
            border: 5px double #616161;
            padding: 40px;
            height: 90%;
        }
        .header {
            font-size: 40px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .sub-header {
            font-size: 20px;
            color: #555;
            margin-bottom: 30px;
        }
        .recipient-name {
            font-size: 35px;
            font-weight: bold;
            color: #0d6efd;
            border-bottom: 2px solid #ccc;
            display: inline-block;
            padding-bottom: 5px;
            margin: 20px 0;
        }
        .course-name {
            font-size: 25px;
            font-weight: bold;
            margin: 20px 0;
        }
        .content {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            padding: 0 50px;
        }
        .signature {
            border-top: 1px solid #333;
            width: 200px;
            text-align: center;
            padding-top: 10px;
        }
        .date {
            margin-top: 40px;
            font-size: 14px;
            color: #777;
        }
        .logo {
            width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="inner-border">
            <!-- <img src="{{ public_path('images/logo.png') }}" class="logo" alt="Logo"> -->

            <div class="header">Certificate of Completion</div>
            <div class="sub-header">This is to certify that</div>

            <div class="recipient-name">{{ $certificate->user->name }}</div>

            <div class="content">
                has successfully completed the course
            </div>

            <div class="course-name">{{ $certificate->course->title }}</div>

            <div class="content">
                demonstrating dedication and mastery of the subject matter.
            </div>

            <div class="date">
                Issued on: {{ \Carbon\Carbon::parse($certificate->issue_date)->format('F d, Y') }}
                <br>
                Certificate ID: {{ $certificate->certificate_code }}
            </div>

            <!-- Signatures (Visual simulation) -->
            <table style="width: 100%; margin-top: 50px;">
                <tr>
                    <td align="center">
                        <div class="signature">
                            <span style="font-family: 'Cursive', serif; font-size: 20px;">Director Signature</span>
                            <br>Director
                        </div>
                    </td>
                    <td align="center">
                        <div class="signature">
                            <span style="font-family: 'Cursive', serif; font-size: 20px;">Instructor Signature</span>
                            <br>Instructor
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
