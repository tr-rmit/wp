// The code below creates an object called 'book' with properties like title, author, year, genre, and rating.
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

// It then logs each property to the console, displaying the details of the book.
const msg = document.getElementById("msg");
msg.innerHTML += "Title: " + book.title + "<br>";
msg.innerHTML += "Author: " + book.author + "<br>";
msg.innerHTML += "Year: " + book.year + "<br>";
msg.innerHTML += "Genre: " + book.genre + "<br>";
msg.innerHTML += "Rating: " + book.rating + "<br><br>";

// If you don't know what the keys are ...
for(i in book) {
	msg.innerHTML += i + ": " + book[i] + "<br>";
}

// An indexed array of books

for(let b=0; b<books.length; b++) {
	msg.innerHTML += "<h4>Book "+(b+1) + " Details: </h4>";
	for(i in books[b]) {
	 	msg.innerHTML += i + ": " + books[b][i] + "<br>";
	}
	msg.innerHTML += "<br>";
}