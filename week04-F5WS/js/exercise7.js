let book = {
  title: "Let the Right One In",
  author: "John Ajvide Lindqvist",
  published: 2005
}; // quoted keys are optional

//use the . syntax to access the property of the book variable	
console.log(book.title);
console.log(book.author);
console.log(book.published);

console.log(book);

console.table(book);

// indexed array of book objects 
let books = [
  {
    title: "Let the Right One In",
    author: "John Ajvide Lindqvist",
    published: 2005
  },
  {
    title: "Return of the King",
    author: "J.R.R. Tolkein",
    published: 1955
  }
]; // quoted keys are optional

console.table(books);
