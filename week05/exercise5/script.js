// could use document.querySelector('#statusFilter');
const filter = document.getElementById('statusFilter');
const courses = document.querySelectorAll('.course');

// previously we used filter.addEventListener('change', function() {
filter.addEventListener('change', () => {
  const selectedStatus = filter.value;
  // console.log(selectedStatus);
  /*
    for(let i = 0; i < courses.length; i++){ courses[i] ... }
  */
  console.log(courses);
  courses.forEach(course => {
    //console.log(course);
    const courseStatus = course.dataset.status;

    if(selectedStatus === 'all' || courseStatus === selectedStatus) {
      // course.style.display = 'inline-block';
      course.style.opacity = 1;
      course.style.marginTop = "10px";
    } else {
      // course.style.display = 'none';
      course.style.opacity = 0.5;
      course.style.marginTop = "50px";
    }
  });
});