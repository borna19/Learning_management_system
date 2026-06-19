<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Introduction to Laravel',
                'description' => 'Learn the basics of the Laravel framework, including routing, controllers, and views.',
                'category' => 'Web Development',
                'price' => 49.99,
                'status' => 'published',
                'level' => 'beginner',
            ],
            [
                'title' => 'Mastering PHP',
                'description' => 'Deep dive into PHP concepts, from basic syntax to advanced object-oriented programming.',
                'category' => 'Web Development',
                'price' => 59.99,
                'status' => 'published',
                'level' => 'intermediate',
            ],
            [
                'title' => 'Web Development Bootcamp',
                'description' => 'A complete guide to becoming a full-stack web developer using HTML, CSS, JS, and PHP.',
                'category' => 'Web Development',
                'price' => 99.99,
                'status' => 'published',
                'level' => 'beginner',
            ],
            [
                'title' => 'Database Design Fundamentals',
                'description' => 'Learn how to design efficient and scalable databases using MySQL.',
                'category' => 'Data Science',
                'price' => 39.99,
                'status' => 'published',
                'level' => 'intermediate',
            ],
            [
                'title' => 'API Development with Laravel',
                'description' => 'Build robust and secure RESTful APIs using Laravel resources and authentication.',
                'category' => 'Web Development',
                'price' => 69.99,
                'status' => 'published',
                'level' => 'advanced',
            ],
            [
                'title' => 'JavaScript for Beginners',
                'description' => 'Get started with JavaScript, the programming language of the web. Learn variables, loops, and functions.',
                'category' => 'Web Development',
                'price' => 29.99,
                'status' => 'published',
                'level' => 'beginner',
            ],
            [
                'title' => 'React.js Essentials',
                'description' => 'Build modern, interactive user interfaces with the React library. Learn components, state, and props.',
                'category' => 'Web Development',
                'price' => 79.99,
                'status' => 'published',
                'level' => 'intermediate',
            ],
            [
                'title' => 'Python for Data Science',
                'description' => 'Learn how to use Python for data analysis and visualization using libraries like Pandas and Matplotlib.',
                'category' => 'Data Science',
                'price' => 89.99,
                'status' => 'published',
                'level' => 'beginner',
            ],
            [
                'title' => 'Introduction to Cyber Security',
                'description' => 'Understand the fundamentals of cyber security, including threats, vulnerabilities, and defense strategies.',
                'category' => 'Business',
                'price' => 45.00,
                'status' => 'published',
                'level' => 'beginner',
            ],
            [
                'title' => 'Digital Marketing 101',
                'description' => 'Learn the basics of digital marketing, including SEO, social media marketing, and email campaigns.',
                'category' => 'Marketing',
                'price' => 35.00,
                'status' => 'published',
                'level' => 'beginner',
            ],
             [
                'title' => 'Mobile App Development with Flutter',
                'description' => 'Build beautiful native apps for iOS and Android using a single codebase with Flutter.',
                'category' => 'Web Development',
                'price' => 119.99,
                'status' => 'published',
                'level' => 'intermediate',
            ],
            [
                'title' => 'Machine Learning Basics',
                'description' => 'An introduction to machine learning concepts and algorithms using Python.',
                'category' => 'Data Science',
                'price' => 129.99,
                'status' => 'published',
                'level' => 'advanced',
            ],
             [
                'title' => 'UI/UX Design Principles',
                'description' => 'Learn the fundamental principles of user interface and user experience design to create intuitive products.',
                'category' => 'Design',
                'price' => 55.00,
                'status' => 'published',
                'level' => 'beginner',
            ],
        ];

        foreach ($courses as $courseData) {
            Course::updateOrCreate(
                ['title' => $courseData['title']], // Search criteria
                $courseData // Data to update or create
            );
        }
    }
}
