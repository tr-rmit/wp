const statusFilter = document.getElementById("statusFilter");
const courses = document.querySelectorAll(".course");

statusFilter.addEventListener("change", function () {
  const selectedStatus = statusFilter.value;
  courses.forEach(function (course) {
    const courseStatus = course.dataset.status;
    if (selectedStatus === "all" || courseStatus === selectedStatus) {
      course.style.display = "inline-block";
      /* Bonus: Fade the unrelated courses out instead
      course.style.opacity = 1; */
    } else {
      course.style.display = "none";
      /* Bonus: Fade the unrelated courses out instead
      course.style.opacity = 0.2; */
    }
  });
});