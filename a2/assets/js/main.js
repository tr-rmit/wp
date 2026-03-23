      function filterBooks(selected) {
        console.log(selected); //"filterbooks called"
        if (selected=="") {
          console.log("implement show all books");
        } else if (selected=="shelved"){
          console.log("implement show only shelved books");
        } else if (selected=="reserved"){
          console.log("implement show only reserved books");
        }
      }