const books = [
  {
    title: "The Hobbit",
    author: "JRR Tolkien",
    genre: "Fantasy",
    year: "1937",
    rating: "9/10"
  },
  {
    title: "Enigma",
    author: "Hugh Segab-Montefiore",
    genre: "Non-Fiction",
    year: "2000",
    rating: "8/10"
  },
  {
    title: "Zen and the art of Motorcycle Maintenance",
    author: "Robert M Pirsig",
    genre: "Roady",
    year: "1974",
    rating: "10/10"
  }
];

function printAllBooks() {
  headings = Object.keys(books[0]);
  document.write("<tr>");
  for (let h=0; h<headings.length; h++) {
    document.write("<th>"+headings[h]+"</th>");
  }
  document.write("</tr>");
  for(let b=0; b<books.length; b++) {
    document.write("  <tr>");
    for(let a in books[b])
     document.write("<td>"+books[b][a]+"</td>")
    document.write("  </tr>");
    }
}