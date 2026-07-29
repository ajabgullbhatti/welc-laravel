# AGENTS.md

## Project Goal
Build a modern, responsive website inspired by https://welc.edu.pk/ using Laravel for the backend and Tailwind CSS for the design.

The final site should feel polished, educational, and conversion-focused, with a strong hero section, course listings, upcoming batches, testimonials, events, and a professional footer.

## Tech Stack
- Laravel 11/10 (latest stable supported version)
- PHP 8.2+
- Tailwind CSS
- Alpine.js or vanilla JavaScript for light interactivity
- Blade templates
- PostgreSQL for local development
- Laravel Breeze or Jetstream for auth if needed

## Project Requirements
- Use Laravel routing and Blade views.
- Use Tailwind CSS for all styling; avoid Bootstrap.
- Keep the site responsive for mobile, tablet, and desktop.
- Use reusable Blade components for sections such as navbar, hero, cards, CTA, footer, and forms.
- Make the layout feel close to the reference site while improving structure and maintainability.

## Reference Website Structure
The homepage should include these sections:

1. Header / Navigation
   - Brand/logo
   - Home
   - About Us
   - Courses
   - Gallery
   - Contact Us
   - CTA button like "Create Account" or "Browse Courses"

2. Hero Section
   - Large headline: "Learn, Earn & Make Your Future"
   - Supporting paragraph about skill-based learning
   - Two buttons: Explore Courses and Upcoming Batches
   - Visual image or illustration

3. Featured Courses
   - Display 4-6 course cards
   - Each card should show:
     - title
     - short description
     - duration
     - category
     - price
     - ratings/reviews if available
     - View Details or Enroll button

4. About Section
   - Intro text about WebExcels Learning Centre
   - Short paragraph explaining the value proposition
   - Image or visual

5. Why Choose Us / WELC Advantage
   - Four feature blocks, such as:
     - Expert Instructors
     - 100% Hands-on Learning
     - Verified Certificate
     - Learn to Earn

6. Upcoming Batches
   - Cards showing batch title, start/end dates, schedule, price, and enroll button

7. Recent Events / Campus Life
   - Event cards with title, date, summary, and image

8. Testimonials / Student Success Stories
   - Multiple testimonial cards with quote, student name, and role

9. Call to Action Section
   - Strong action block encouraging users to enroll or browse courses

10. Footer
   - Quick links
   - Social media links
   - Contact information
   - Location details
   - Copyright notice

## Suggested Laravel Structure
Use this structure for the implementation:

- app/Http/Controllers/
  - HomeController
  - CourseController
  - BatchController
  - EventController
  - PageController
- app/Models/
  - Course
  - Batch
  - Testimonial
  - Event
- resources/views/
  - layouts/app.blade.php
  - components/navbar.blade.php
  - components/footer.blade.php
  - home.blade.php
  - courses/index.blade.php
  - courses/show.blade.php
  - about.blade.php
  - contact.blade.php
  - gallery.blade.php
  - partials/hero.blade.php
- routes/web.php
- database/migrations/
- database/seeders/
- resources/css/app.css
- tailwind.config.js

## Content Model Suggestions
### Course
Fields:
- title
- slug
- short_description
- description
- category
- duration
- price
- rating
- reviews
- image
- featured
- is_active

### Batch
Fields:
- title
- course_id
- start_date
- end_date
- schedule
- price
- featured

### Testimonial
Fields:
- name
- role
- quote
- image
- active

### Event
Fields:
- title
- description
- date
- location
- image
- featured

## Design Direction
Use Tailwind CSS with a modern educational theme.

Suggested visual style:
- Primary color: dark navy or deep blue
- Accent color: teal, cyan, or orange for buttons and highlights
- White and light gray backgrounds
- Rounded cards and modern shadows
- Clear spacing and strong typography
- Soft gradients for hero area and CTA section

Use these Tailwind utilities consistently:
- container mx-auto px-4 sm:px-6 lg:px-8
- max-w-7xl for content width
- rounded-2xl, shadow-lg, bg-white, border border-gray-200
- text-4xl md:text-6xl for hero headings
- grid md:grid-cols-2 lg:grid-cols-3 for cards

## Page Implementation Notes
### Home Page
Build the homepage as a single, polished landing page with the sections listed above.

### Courses Page
Create a course listing page with:
- hero banner
- filter by category if possible
- cards for all courses
- link to course detail page

### Course Detail Page
Show:
- title
- description
- duration
- price
- category
- curriculum highlights
- enroll button

### Contact Page
Include:
- contact information
- simple contact form
- map or location section if available

### About Page
Include:
- institution overview
- mission and values
- staff or instructor highlights

## SEO and Accessibility
- Use meaningful headings: h1, h2, h3
- Add proper alt text to images
- Use semantic HTML
- Ensure links, buttons, and forms are keyboard accessible
- Add meta title and description for each page
- Ensure the site is mobile-friendly

## Content Notes
Use the reference website content as the base, but improve the copy for clarity and professionalism.

Suggested copy themes:
- Learn practical digital skills
- Build a portfolio and earn confidently
- Join expert-led training with real-world projects
- Prepare for freelancing, job opportunities, and business growth

## Build Steps
1. Initialize a Laravel project if not already present.
2. Install and configure Tailwind CSS.
3. Create the main layout and reusable components.
4. Build the homepage sections in order:
   - navbar
   - hero
   - featured courses
   - about
   - advantages
   - batches
   - testimonials
   - CTA
   - footer
5. Create database models and seeders for courses, batches, testimonials, and events.
6. Add routes and controllers for the main pages.
7. Test the site on mobile and desktop.
8. Polish visuals and spacing to match the reference brand feel.

## Quality Bar
The implementation should:
- look professional and modern
- be easy to navigate
- use Laravel conventions properly
- use Tailwind CSS thoroughly and consistently
- be maintainable and extensible for future page additions

## Important Constraints
- Do not use Bootstrap.
- Keep the design clean and modern rather than overly complex.
- Focus on a strong educational brand experience.
- Prefer reusable components over duplicate markup.
- Keep code organized and readable.
