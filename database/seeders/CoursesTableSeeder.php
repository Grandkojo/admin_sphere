<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([

            //civil engineering courses
            ['course_code' => 'CIE 101', 'course_name' => 'Introduction to Civil Engineering', 'course_description' => 'Introduction to Civil Engineering', 'program_id' => 1],
            ['course_code' => 'CIE 102', 'course_name' => 'Civil Engineering Drawing', 'course_description' => 'Civil Engineering Drawing', 'program_id' => 1],
            ['course_code' => 'CIE 103', 'course_name' => 'Civil Engineering Materials', 'course_description' => 'Civil Engineering Materials', 'program_id' => 1],
            ['course_code' => 'CIE 104', 'course_name' => 'Engineering Mathematics', 'course_description' => 'Engineering Mathematics', 'program_id' => 1],
            ['course_code' => 'CIE 105', 'course_name' => 'Engineering Physics', 'course_description' => 'Engineering Physics', 'program_id' => 1],
            ['course_code' => 'CIE 106', 'course_name' => 'Engineering Chemistry', 'course_description' => 'Engineering Chemistry', 'program_id' => 1],
            ['course_code' => 'CIE 107', 'course_name' => 'Engineering Drawing', 'course_description' => 'Engineering Drawing', 'program_id' => 1],
            ['course_code' => 'CIE 108', 'course_name' => 'Engineering Mechanics', 'course_description' => 'Engineering Mechanics', 'program_id' => 1],
            ['course_code' => 'CIE 109', 'course_name' => 'Engineering Surveying', 'course_description' => 'Engineering Surveying', 'program_id' => 1],
            ['course_code' => 'CIE 110', 'course_name' => 'Engineering Geology', 'course_description' => 'Engineering Geology', 'program_id' => 1],
            ['course_code' => 'CIE 111', 'course_name' => 'Engineering Geophysics', 'course_description' => 'Engineering Geophysics', 'program_id' => 1],
            ['course_code' => 'CIE 112', 'course_name' => 'Engineering Geotechnics', 'course_description' => 'Engineering Geotechnics', 'program_id' => 1],
            ['course_code' => 'CIE 113', 'course_name' => 'Engineering Hydrology', 'course_description' => 'Engineering Hydrology', 'program_id' => 1],


            //mechanical engineering courses
            ['course_code' => 'ME 101', 'course_name' => 'Introduction to Mechanical Engineering', 'course_description' => 'Introduction to Mechanical Engineering', 'program_id' => 2],
            ['course_code' => 'ME 102', 'course_name' => 'Mechanical Engineering Drawing', 'course_description' => 'Mechanical Engineering Drawing', 'program_id' => 2],
            ['course_code' => 'ME 103', 'course_name' => 'Mechanical Engineering Materials', 'course_description' => 'Mechanical Engineering Materials', 'program_id' => 2],
            ['course_code' => 'ME 104', 'course_name' => 'Engineering Mathematics', 'course_description' => 'Engineering Mathematics', 'program_id' => 2],
            ['course_code' => 'ME 105', 'course_name' => 'Engineering Physics', 'course_description' => 'Engineering Physics', 'program_id' => 2],
            ['course_code' => 'ME 106', 'course_name' => 'Engineering Chemistry', 'course_description' => 'Engineering Chemistry', 'program_id' => 2],
            ['course_code' => 'ME 107', 'course_name' => 'Engineering Drawing', 'course_description' => 'Engineering Drawing', 'program_id' => 2],
            ['course_code' => 'ME 108', 'course_name' => 'Engineering Mechanics', 'course_description' => 'Engineering Mechanics', 'program_id' => 2],
            ['course_code' => 'ME 109', 'course_name' => 'Engineering Surveying', 'course_description' => 'Engineering Surveying', 'program_id' => 2],
            ['course_code' => 'ME 110', 'course_name' => 'Engineering Geology', 'course_description' => 'Engineering Geology', 'program_id' => 2],
            ['course_code' => 'ME 111', 'course_name' => 'Engineering Geophysics', 'course_description' => 'Engineering Geophysics', 'program_id' => 2],
            ['course_code' => 'ME 112', 'course_name' => 'Engineering Geotechnics', 'course_description' => 'Engineering Geotechnics', 'program_id' => 2],
            ['course_code' => 'ME 113', 'course_name' => 'Engineering Hydrology', 'course_description'=> 'Engineering Hydrology', 'program_id' => 2],


            // Mechanical Engineering Courses
            ['course_code' => 'ME 101', 'course_name' => 'Introduction to Mechanical Engineering', 'course_description' => 'Introduction to the basics of mechanical engineering.', 'program_id' => 2],
            ['course_code' => 'ME 102', 'course_name' => 'Thermodynamics', 'course_description' => 'Study of energy transfer and thermodynamic processes.', 'program_id' => 2],
            ['course_code' => 'ME 103', 'course_name' => 'Fluid Mechanics', 'course_description' => 'Introduction to fluid behavior in engineering systems.', 'program_id' => 2],
            ['course_code' => 'ME 104', 'course_name' => 'Strength of Materials', 'course_description' => 'Study of material deformation and failure.', 'program_id' => 2],
            ['course_code' => 'ME 105', 'course_name' => 'Dynamics of Machines', 'course_description' => 'Analysis of machine motion and forces.', 'program_id' => 2],

            // Electrical Engineering Courses
            ['course_code' => 'EE 201', 'course_name' => 'Circuit Analysis', 'course_description' => 'Introduction to electrical circuits and their components.', 'program_id' => 3],
            ['course_code' => 'EE 202', 'course_name' => 'Electromagnetic Theory', 'course_description' => 'Study of electromagnetic fields and waves.', 'program_id' => 3],
            ['course_code' => 'EE 203', 'course_name' => 'Power Systems', 'course_description' => 'Introduction to power generation and distribution systems.', 'program_id' => 3],
            ['course_code' => 'EE 204', 'course_name' => 'Control Systems', 'course_description' => 'Study of automatic control systems.', 'program_id' => 3],
            ['course_code' => 'EE 205', 'course_name' => 'Signals and Systems', 'course_description' => 'Introduction to signal processing and systems theory.', 'program_id' => 3],

            // Computer Engineering Courses
            ['course_code' => 'CE 301', 'course_name' => 'Digital Logic Design', 'course_description' => 'Basics of digital systems and logic circuits.', 'program_id' => 4],
            ['course_code' => 'CE 302', 'course_name' => 'Microprocessor Systems', 'course_description' => 'Study of microprocessor architecture and programming.', 'program_id' => 4],
            ['course_code' => 'CE 303', 'course_name' => 'Computer Networks', 'course_description' => 'Introduction to network principles and protocols.', 'program_id' => 4],
            ['course_code' => 'CE 304', 'course_name' => 'Operating Systems', 'course_description' => 'Study of operating system concepts and implementation.', 'program_id' => 4],
            ['course_code' => 'CE 305', 'course_name' => 'Software Engineering', 'course_description' => 'Introduction to software development methodologies.', 'program_id' => 4],

            // Chemical Engineering Courses
            ['course_code' => 'CH 401', 'course_name' => 'Chemical Process Principles', 'course_description' => 'Study of chemical process fundamentals.', 'program_id' => 5],
            ['course_code' => 'CH 402', 'course_name' => 'Reaction Engineering', 'course_description' => 'Study of chemical reaction kinetics.', 'program_id' => 5],
            ['course_code' => 'CH 403', 'course_name' => 'Transport Phenomena', 'course_description' => 'Study of heat, mass, and momentum transfer.', 'program_id' => 5],
            ['course_code' => 'CH 404', 'course_name' => 'Separation Processes', 'course_description' => 'Study of separation techniques in chemical engineering.', 'program_id' => 5],
            ['course_code' => 'CH 405', 'course_name' => 'Process Control', 'course_description' => 'Study of control methods in chemical processes.', 'program_id' => 5],

            // Computer Science Courses
            ['course_code' => 'CS 501', 'course_name' => 'Introduction to Computer Science', 'course_description' => 'Basics of computer science and programming.', 'program_id' => 6],
            ['course_code' => 'CS 502', 'course_name' => 'Data Structures and Algorithms', 'course_description' => 'Introduction to algorithms and data organization.', 'program_id' => 6],
            ['course_code' => 'CS 503', 'course_name' => 'Database Systems', 'course_description' => 'Introduction to database management systems.', 'program_id' => 6],
            ['course_code' => 'CS 504', 'course_name' => 'Artificial Intelligence', 'course_description' => 'Study of AI principles and applications.', 'program_id' => 6],
            ['course_code' => 'CS 505', 'course_name' => 'Machine Learning', 'course_description' => 'Introduction to machine learning algorithms.', 'program_id' => 6],

            // Cyber Security Courses
            ['course_code' => 'CY 601', 'course_name' => 'Introduction to Cyber Security', 'course_description' => 'Basics of cyber security principles.', 'program_id' => 7],
            ['course_code' => 'CY 602', 'course_name' => 'Network Security', 'course_description' => 'Study of securing network infrastructure.', 'program_id' => 7],
            ['course_code' => 'CY 603', 'course_name' => 'Cryptography', 'course_description' => 'Study of encryption and decryption techniques.', 'program_id' => 7],
            ['course_code' => 'CY 604', 'course_name' => 'Ethical Hacking', 'course_description' => 'Introduction to penetration testing and ethical hacking.', 'program_id' => 7],
            ['course_code' => 'CY 605', 'course_name' => 'Incident Response', 'course_description' => 'Study of responding to cyber security breaches.', 'program_id' => 7],

            // Business Administration Courses
            ['course_code' => 'BA 701', 'course_name' => 'Introduction to Business', 'course_description' => 'Basics of business administration.', 'program_id' => 8],
            ['course_code' => 'BA 702', 'course_name' => 'Marketing Principles', 'course_description' => 'Study of marketing strategies and principles.', 'program_id' => 8],
            ['course_code' => 'BA 703', 'course_name' => 'Financial Accounting', 'course_description' => 'Introduction to accounting principles.', 'program_id' => 8],
            ['course_code' => 'BA 704', 'course_name' => 'Organizational Behavior', 'course_description' => 'Study of human behavior in organizations.', 'program_id' => 8],
            ['course_code' => 'BA 705', 'course_name' => 'Business Law', 'course_description' => 'Study of legal principles in business.', 'program_id' => 8],

            // Marketing Courses
            ['course_code' => 'MK 801', 'course_name' => 'Principles of Marketing', 'course_description' => 'Introduction to marketing concepts.', 'program_id' => 9],
            ['course_code' => 'MK 802', 'course_name' => 'Consumer Behavior', 'course_description' => 'Study of factors affecting consumer decisions.', 'program_id' => 9],
            ['course_code' => 'MK 803', 'course_name' => 'Digital Marketing', 'course_description' => 'Study of marketing in digital environments.', 'program_id' => 9],
            ['course_code' => 'MK 804', 'course_name' => 'Brand Management', 'course_description' => 'Study of managing brand equity and value.', 'program_id' => 9],
            ['course_code' => 'MK 805', 'course_name' => 'Sales Management', 'course_description' => 'Study of sales strategies and techniques.', 'program_id' => 9],

        ]);
    }
}
