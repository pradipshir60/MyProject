/*var chaitanya = {
    "firstName": "Chaitanya",
    "lastName": "Singh",
    "age": "28"
};
console.log(chaitanya.firstName);
console.log(chaitanya.lastName);
console.log(chaitanya.age);*/
/*var student = '{"rollno":101, "name":"Mayank", "age":20}';
var object1 = JSON.parse(student);
console.log(object1);*/
var chaitanya = {
        "students": [
            { "name": "John", "age": "23", "city": "Agra" },
            { "name": "Steve", "age": "28", "city": "Delhi" },
            { "name": "Peter", "age": "32", "city": "Chennai" },
            { "name": "Chaitanya", "age": "28", "city": "Bangalore" }
        ]
    }
    //console.log(chaitanya);
console.log(chaitanya.students[1].name);
console.log(chaitanya.students[0].age);
console.log(chaitanya.students[0].city);