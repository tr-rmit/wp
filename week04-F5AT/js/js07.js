const book = {
	title: "Let the Right One In",
	author: "John Ajvide Lindqvist",
	year: 2005,
	genre: "Fiction",
	rating: 5
}

const books = [
	{
		title: "Let the Right One In",
		author: "John Ajvide Lindqvist",
		year: 2005,
		genre: "Fiction",
		rating: 5
	},
	{
		title: "Whispers of the Wind",
		author: "Eleanor Hart",
		year: 2010,
		genre: "Biography",
		rating: 4
	}
];


console.log(book.title);
console.log(book.author);
console.log(book.year);
console.log(book.genre);
console.log(book.rating);
// The above code creates an object called 'book' with properties like title, author, year, genre, and rating.
// It then logs each property to the console, displaying the details of the book.
let msg = document.getElementById("msg");
msg.innerHTML += "Title: " + book.title + "<br>";
msg.innerHTML += "Author: " + book.author + "<br>";
msg.innerHTML += "Year: " + book.year + "<br>";
msg.innerHTML += "Genre: " + book.genre + "<br>";
msg.innerHTML += "Rating: " + book.rating + "<br><br>";
// The above code retrieves the HTML element with the ID "msg" and appends the book details to it,
for(i in book) {
	msg.innerHTML += i + ": " + book[i] + "<br>";
}
msg.innerHTML += "<br><br>";

for(let b=0; b<books.length; b++) {
	msg.innerHTML += "<h4>Book "+(b+1) + " Details: </h4>";
	for(i in books[b]) {
	 	msg.innerHTML += i + ": " + books[b][i] + "<br>";
	}
	msg.innerHTML += "<br>";
}