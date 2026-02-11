//normal function
function my_func(course) {
    console.log(`Welcome to the course ${course}`);
}
my_func("JavaScript Basics");

//function expression
const add = function(a, b) {
    return a + b;
};

const mult = function(x, y) {
    return x * y;
};

let x = add(3, 2);
console.log("(expression) total lessons", x);

//arrow function
const addition = (a, b) => a + b;

let y = addition(4, 6);
console.log("(arrow) total modules", y);

//immediate function
(function() {
    console.log("Online Learning Platform Initialized");
})();

//higher order function
let a = [10, 20, 30, 40];

a.forEach((el, ind, arr) => {
    console.log("elem =", el, "ind =", ind, "arr =", arr);
});

//map
let newarr = a.map((el) => {
    return el * el;
});

console.log(newarr);
