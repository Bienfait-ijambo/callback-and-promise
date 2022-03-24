const user = [
  { id: 1, userName: "bienfait ijambo" },
  {
    repositories: [
      {
        id: 1,
        repoName: "repo1",
      },
      {
        id: 2,
        repoName: "repo2",
      },
    ],
  },
];
function getUser(user) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      console.log("Reading user from database ...");
      resolve(user);
    }, 2000);
  });
}

function getRepositories(repo) {
  return new Promise((resolve, reject) => {
    setInterval(() => {
      //   console.log("Extracting repositories for" + userName);
      resolve(repo);
    }, 2000);
  });
}

async function displayUserRepository(){
    try {
        const gitUser=await getUser(user);
        console.log(gitUser)
        const repo=await getRepositories(user[1].repositories)
        console.log(repo)
    } catch (error) {
        console.log(error.message)
    }
}

displayUserRepository();

// getRepositories(user).then((user)=>{
//     console.log(user[1].repositories)
// })
