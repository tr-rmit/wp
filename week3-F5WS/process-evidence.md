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

21/07/2026

**Date Fixed:**  

**File:** 

index.html, about.html, style.css

**Related Commit:**  

**Symptom:**  

Too much whitespace around the body and first div container.

**Steps to Reproduce:**  

Go to the original file and look for yourself.

**Root Cause:**  

CSS I guess

**Fix:**  

Gemini prompt: "how do i get rid of the margins around a bootstrap container"

Gemini response:

1. The HTML Structure 

Swap your .container class out for .container-fluid to stretch the container to 100% viewport width. Then, attach the utility classes mx-0 (removes horizontal margins) and px-0 (removes horizontal padding).html

Sample code below:

<!-- Full-width container with no margins or padding -->
<div class="container-fluid mx-0 px-0">
  <!-- Use g-0 on the row to completely eliminate inner column gaps -->
  <div class="row g-0">
    <div class="col-12">
      <p>This content is completely flush with the screen edges.</p>
    </div>
  </div>
</div>


**Verification:**  

---

# 🤖 Section 2: AI Usage Log

## AI Task 1

**Date:**  
21/07/2026 - Week 2

**Task Description:**  
Upgrade week 1 pages to implement Bootstrap

**Tool Used:**  
GitHub, Copilot, ChatGPT

**Prompt / Input:**  
I have a basic multi-page HTML website from Week 1. I need to upgrade it
using Bootstrap. The site should have a consistent banner, Bootstrap
navigation, a search field in the navbar, a Bootstrap-styled footer, a
responsive home page layout, a responsive gallery page, and a Bootstrap-
styled contact form.
Please give me a step-by-step plan, but do not write the full code yet.

**AI Output Summary:**  
Step-by-step upgrade plan
Review the current Week 1 structure
Use the existing content in index.html, about.html, and style.css as the base.
Keep the current site purpose, but plan for a more polished multi-page layout with Home, About, Gallery, and Contact.
Add Bootstrap to the pages
Link Bootstrap via its CDN in the head of each page.
Keep your existing custom stylesheet for small overrides, but let Bootstrap handle most of the layout and styling.
Create a consistent site header and banner
Build one shared banner/header style for all pages.
Include the site title, subtitle, and a clear visual theme so the pages feel connected.
Replace the old navigation with a Bootstrap navbar
Convert the current simple list-based navigation into a Bootstrap navbar.
Add links for Home, About, Gallery, and Contact.
Include a search field in the navbar so it matches your requirement.
Redesign the home page with a responsive layout
Use Bootstrap’s grid system to create a modern home page layout.
Place a hero section, short intro text, and supporting content in a responsive arrangement that stacks well on mobile and expands on larger screens.
Create a responsive gallery page
Build a new gallery page with a Bootstrap image grid.
Arrange images in rows and columns so they resize neatly on different screen sizes.
Keep the layout simple and visually balanced.
Create a Bootstrap-styled contact page
Add a new contact page with a Bootstrap form.
Include fields such as name, email, subject, and message.
Style the form with Bootstrap classes so it looks clean and professional.
Style the footer with Bootstrap
Update the footer so it uses a Bootstrap-friendly design.
Add site credits, links, and a tidy layout that matches the rest of the site.
Improve the overall look and responsiveness
Remove old custom layout rules that conflict with Bootstrap.
Test the pages at different widths and adjust spacing, text, and image sizing where needed.
Finish with a quick review
Check that all pages share the same header, navigation, footer, and styling.
Make sure the site is easy to navigate and looks consistent on desktop and mobile.

**What You Accepted:**  
All of it, minus the vague or contradictory aspecs (see below)

**What You Changed:**  
Nothing yet, but this may change later once I get into it.

**Validation Performed:**  
To Do Later

**Issues Identified:**  

"Keep the current site purpose, but plan for a more polished multi-page layout with Home, About, Gallery, and Contact." <-- sounds a little vague

"Replace the old navigation with a Bootstrap navbar
Convert the current simple list-based navigation into a Bootstrap navbar." <-- unclear: are we deleting or upgrading?

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
