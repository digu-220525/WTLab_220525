//var
function showStudent() {
    var student = "Amit";

    if (true) {
        var student = "Riya"; //same variable overwritten
        console.log("Inside block:", student);
    }

    console.log("Outside block:", student);
}

showStudent();

//let
function lessonProgress() {
    let lesson = "HTML Basics";

    if (true) {
        let lesson = "CSS Basics"; //different variable
        console.log("Inside block:", lesson);
    }

    console.log("Outside block:", lesson);
}

lessonProgress();

//const
const websiteName = "LearnSmart";
const totalCourses = 120;

console.log(websiteName);
console.log("Total courses:", totalCourses);

//re-assignment error
//totalCourses = 150;

//var loop
for (var i = 1; i <= 3; i++) {
    console.log("Course number:", i);
}
console.log(i); //accessible due to var scope

//let loop
for (let j = 1; j <= 3; j++) {
    console.log("Course number:", j);
}
//console.log(j); //not accessible

//const object
const course = {
    name: "JavaScript",
    duration: "4 weeks"
};

course.duration = "6 weeks"; //allowed
console.log(course);

//best practice
const siteName = "LearnSmart";
let currentUser = "Student";
let progress = 0;
