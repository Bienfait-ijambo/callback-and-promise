// console.log('start program')
// let sum=console.log(makeSum(2,3))
// console.log("end program")
//synchronous program
//excute code in blocking process(it waits a given line of code finish to excute to pass to another)

function makeSum(a, b) {
  return a + b;
}

//----------------non blocking code or ansynchronous program
//one can perform a given task without waiting another to finish

// console.log("Program Starts");
// setTimeout(() => {
//   console.log("Reading an user from database...");
// }, 2000);
// console.log("Program Ends")

//this a callback :: great way of handling asynchronous behavior
//in javascript
function getUser(id, cb1) {
  setTimeout(() => {
    console.log("reading user from the database...");
    cb1({
      id: id,
      name: "bienfait",
      repositories: [
        { id: 1, repoName: "user-management" },
        { id: 2, repoName: "stock-managment" },
      ],
    });

  }, 2000);
}

function getRepositories(user,cb) {
 setTimeout(() => {
     cb(user)
 }, 2000);
}

getUser(1, (user,) => {
  console.log(user.name);
  getRepositories(user,()=>{
      user.repositories.forEach(repo => {
          console.log('repo : '+repo.repoName)
      });
  })
});
