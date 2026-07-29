# WELC - Learn, Earn & Make Your Future

A modern, responsive educational landing page inspired by [WELC (WebExcels Learning Centre)](https://welc.edu.pk/), built with Laravel, Blade templates, and Tailwind CSS.

## 🎯 Project Overview

WELC is a professional educational website designed to showcase online courses, upcoming batches, student testimonials, and institutional value. The site combines modern design with practical functionality to create a conversion-focused learning platform.

## ✨ Features

### 🏠 Homepage Sections
- **Navigation Bar** - WELC branding, menu links, and Create Account CTA
- **Hero Section** - Eye-catching headline with statistics and action buttons
- **Featured Courses** - Course cards with pricing, duration, and enrollment options
- **About Section** - Institution overview and value proposition
- **Why WELC** - Four key advantages:
  - Expert Instructors
  - 100% Hands-on Learning
  - Verified Certificate
  - Learn to Earn
- **Upcoming Batches** - Batch schedule with pricing and enrollment
- **Campus Life & Events** - Student events and workshops showcase
- **Student Testimonials** - Success stories from graduates
- **Call-to-Action Section** - Strong conversion-focused messaging
- **Footer** - Quick links, contact info, and locations

### 🎨 Design
- **Responsive Layout** - Optimized for mobile, tablet, and desktop
- **Tailwind CSS** - Modern utility-first styling
- **Professional Theme** - Dark navy with teal/cyan accents
- **Reusable Components** - Modular Blade templates for maintainability

## 🛠️ Tech Stack

- **Backend:** Laravel 11/10
- **Frontend:** Blade Templates
- **Styling:** Tailwind CSS
- **Database:** PostgreSQL (for future development)
- **Version Control:** Git
- **Node.js:** Build tooling and server

## 📁 Project Structure

```
laravel-website/
├── public/
│   ├── index.html              # Homepage
│   └── css/                    # Compiled Tailwind CSS
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php   # Main layout
│   │   ├── components/
│   │   │   ├── navbar.blade.php
│   │   │   └── footer.blade.php
│   │   ├── home.blade.php
│   │   ├── about.blade.php
│   │   ├── courses/
│   │   │   ├── index.blade.php
│   │   │   └── show.blade.php
│   │   ├── contact.blade.php
│   │   └── gallery.blade.php
│   └── css/
│       └── app.css             # Tailwind styles
├── app/
│   └── Http/
│       └── Controllers/        # Page controllers
├── routes/
│   └── web.php                 # URL routes
├── tailwind.config.js          # Tailwind configuration
├── postcss.config.js           # PostCSS configuration
├── package.json                # npm dependencies
├── server.js                   # Local development server
├── AGENTS.md                   # Project planning guide
└── README.md                   # This file
```

## 🚀 Getting Started

### Prerequisites
- Node.js 16+ (for development server)
- PHP 8.2+ (for future Laravel backend)
- Composer (for PHP dependencies)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/ajabgullbhatti/welc-laravel.git
   cd welc-laravel
   ```

2. **Install dependencies**
   ```bash
   npm install
   ```

3. **Start the development server**
   ```bash
   node server.js
   ```

4. **Open in browser**
   - Navigate to `http://localhost:8000`

### Building Tailwind CSS

Watch for CSS changes during development:
```bash
npm run watch
```

Build for production:
```bash
npm run build
```

## 📋 Content Model

### Course
- Title, slug, description
- Category, duration, price
- Rating, reviews, featured image
- Active status

### Batch
- Title, associated course
- Start/end dates, schedule
- Price, featured status

### Testimonial
- Name, role
- Quote/feedback
- Image, active status

### Event
- Title, description
- Date, location
- Featured image

## 🎨 Design System

### Colors
- **Primary:** Dark Navy (#1a2a3a)
- **Accent:** Teal/Cyan (#06b6d4)
- **Background:** White/Light Gray
- **Text:** Dark gray/black

### Typography
- **Headings:** Bold, clear hierarchy (h1–h3)
- **Body:** Readable sans-serif
- **CTA:** Strong, action-oriented language

### Components
- Cards with subtle shadows
- Rounded corners (rounded-2xl)
- Consistent spacing (px-4 sm:px-6 lg:px-8)
- Grid layouts (md:grid-cols-2, lg:grid-cols-3)

## 🔄 Workflow

1. **Local Development**
   - Edit Blade templates in `resources/views/`
   - Update Tailwind CSS in `resources/css/app.css`
   - Run development server: `node server.js`

2. **Build Assets**
   - Compile Tailwind: `npm run build`
   - Check for errors

3. **Version Control**
   ```bash
   git add .
   git commit -m "Description of changes"
   git push origin master
   ```

## 📱 Responsive Design

The site is fully responsive with breakpoints:
- **Mobile:** Default (< 640px)
- **Tablet:** sm (640px+), md (768px+)
- **Desktop:** lg (1024px+), xl (1280px+)

All components adapt to screen size for optimal viewing experience.

## ♿ Accessibility

- Semantic HTML structure
- Proper heading hierarchy
- Alt text for images
- Keyboard navigation support
- ARIA labels where appropriate
- Sufficient color contrast

## 🔍 SEO

- Meta title and description for each page
- Semantic HTML elements
- Structured content
- Mobile-friendly design
- Fast load times with optimized assets

## 📊 Performance

- Lightweight CSS (~50KB minified)
- Optimized images
- Minimal JavaScript
- Efficient asset delivery

## 🤝 Contributing

To contribute to this project:

1. Create a feature branch
2. Make your changes
3. Test thoroughly
4. Submit a pull request

## 📝 License

This project is open source and available under the MIT License.

## 📧 Contact

- **Organization:** WELC (WebExcels Learning Centre)
- **Website:** https://welc.edu.pk/
- **Repository:** https://github.com/ajabgullbhatti/welc-laravel

## 🎓 Project Goals

- Create a modern, professional educational brand presence
- Showcase courses and learning opportunities
- Build trust through testimonials and institutional messaging
- Drive enrollments through strategic CTAs
- Provide a foundation for expanding features (student portal, course enrollment, payment integration, etc.)

## 🚀 Future Enhancements

- Full Laravel backend integration
- Student authentication and enrollment
- Payment gateway integration
- Advanced course filtering and search
- Admin dashboard for content management
- Blog section for educational content
- Email notifications
- Analytics integration

## 🎯 Quick Links

- [WELC Official Site](https://welc.edu.pk/)
- [GitHub Repository](https://github.com/ajabgullbhatti/welc-laravel)
- [Project Planning](AGENTS.md)

---

**Status:** ✅ Live at http://localhost:8000 | Last Updated: July 2026
