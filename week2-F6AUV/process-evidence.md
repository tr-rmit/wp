# Process Evidence Log

This file combines:
1. Debugging records
2. AI (e.g., Copilot/ChatGPT) usage logs

You must maintain this file throughout development.

---

## General Instructions
- Record entries as you work (not at the end)
- Be honest and specific
- Link to commits.Each debugging record must include at least one related GitHub commit 
(using commit hash and URL).
- Superficial or fabricated entries will not receive marks

---

# 🔧 Section 1: Debugging Records

## Bug 1

**Date Identified:**  
(e.g., 15/03/2026)

**Date Fixed:**  
(e.g., 15/03/2026)

**File:**  
(e.g., about.html)

**Related Commit:**  
(e.g., abc1234)

**Symptom:**  
What went wrong?

**Steps to Reproduce:**  
How can the issue be triggered?

**Root Cause:**  
Why did the issue occur?

**Fix:**  
What did you change?

**Verification:**  
How did you confirm the fix?

---

## Bug 2

**Date Identified:**  

**Date Fixed:**  

**File:**  

**Related Commit:**  

**Symptom:**  

**Steps to Reproduce:**  

**Root Cause:**  

**Fix:**  

**Verification:**  

---

# 🤖 Section 2: AI Usage Log

## AI Task 1

**Date:**  
22/07/2026

**Task Description:**  
Upgrade Week 1 Pages

**Tool Used:**  
GitHub Copilot, ChatGPT

**Prompt / Input:**  
I have a basic multi-page HTML website from Week 1. I need to upgrade it
using Bootstrap. The site should have a consistent banner, Bootstrap
navigation, a search field in the navbar, a Bootstrap-styled footer, a
responsive home page layout, a responsive gallery page, and a Bootstrap-
styled contact form.
Please give me a step-by-step plan, but do not write the full code yet.

**AI Output Summary:**  
I will review the existing Week 1 site structure and then outline a practical upgrade plan that fits your current files and assessment constraints.




Step-by-step upgrade plan
Based on the current structure in index.html and about.html, I would upgrade the site in this order:

Review and map the existing pages

Identify what should stay from the Week 1 version, such as your banner text, profile content, and footer links.
Decide which pages you want to keep and which new pages to add for the full Bootstrap experience.
Set up Bootstrap for the site

Add the Bootstrap stylesheet and Bootstrap JavaScript CDN links in the head and body of each page.
Keep your existing custom stylesheet for any small adjustments, but let Bootstrap handle most layout and styling.
Create a consistent site layout

Build one shared structure for all pages: a banner/header, a Bootstrap navbar, a main content area, and a footer.
Add a search field inside the navbar so it appears consistently on every page.
Redesign the home page

Turn the current content into a responsive Bootstrap layout using containers, rows, and columns.
Add a hero section or introductory content block, then arrange the rest of the page in a mobile-friendly layout.
Build a responsive gallery page

Create a new gallery page with Bootstrap cards, grid layout, or image thumbnails.
Make sure the gallery stacks neatly on smaller screens and displays nicely on larger screens.
Add a Bootstrap-styled contact form

Create a new contact page with a Bootstrap form that includes fields such as name, email, subject, and message.
Style the form using Bootstrap classes so it looks polished and consistent.
Improve navigation and page consistency

Make sure the navbar links work across all pages and point to Home, About, Gallery, and Contact.
Keep the banner, colors, spacing, and footer style consistent across the whole site.
Test responsiveness and polish

Check the layout on desktop, tablet, and mobile widths.
Fix spacing, alignment, and image issues so the site feels clean and professional.
If you want, I can now move to the implementation step and build this upgrade for you.

**What You Accepted:**  
TBA

**What You Changed:**  
TBA

**Validation Performed:**  
TBA

**Issues Identified:**  
Not sure if "Add the Bootstrap stylesheet and Bootstrap JavaScript CDN links in the head and body of each page." is correct, just adding it to the head NOPE head and body (my bad).

Was not told to convert nav to bootstrap, doing it anyway.

---

## AI Task 2

**Date:**  

**Task Description:**  

**Tool Used:**  

**Prompt / Input:**  

**AI Output Summary:**  

**What You Accepted:**  

**What You Changed:**  

**Validation Performed:**  

**Issues Identified:**  
