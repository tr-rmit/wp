const book = {
	title: "Let the Right One In",
	author: "John Ajvide Lindqvist",
	year: 2005,
	genre: "Fiction",
	rating: 5
};

const books = [
   {
      title: "Let the Right One In",
      author: "John Ajvide Lindqvist",
      year: 2005,
      genre: "Fiction",
      rating: 5   
   },
   {
      title: "LWhispers of the Wind",
      author: "Eleanor Hart",
      year: 2010,
      genre: "Autobiography",
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
const msg = document.getElementById("msg");
msg.innerHTML += "Title: " + book.title + "<br>";
msg.innerHTML += "Author: " + book.author + "<br>";
msg.innerHTML += "Year: " + book.year + "<br>";
msg.innerHTML += "Genre: " + book.genre + "<br>";
msg.innerHTML += "Rating: " + book.rating + "<br>";

for(let i=0; i<Array.length; i++) {
   // works for a simple array
}

for(let i in book) {
   console.log(i + ' == ' +book[i]);
}

for(let b=0; b<books.length; b++) {
   console.log("Book " + (b+1) + ":");
   for(let i in books[b]) {
      console.log("- "+ i + ' == ' +book[i]);
   }
}

// The above code retrieves the HTML element with the ID "msg" and appends the book details to it,