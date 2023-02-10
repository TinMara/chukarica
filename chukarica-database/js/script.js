let numTrophies=document.querySelectorAll("#numTrophies");

let ligueOne=numTrophies[0];
let frenchCup=numTrophies[1];
let leagueCup=numTrophies[2];
let championsTrophy=numTrophies[3];
let winnersCup=numTrophies[4]; 

console.log(ligueOne.innerHTML);
console.log(frenchCup.innerHTML);
console.log(leagueCup.innerHTML);
console.log(championsTrophy.innerHTML);
console.log(winnersCup.innerHTML);

for(let i=0;i<11;i++) {
    ligueOne.innerHTML=i;
}

for(let i=0;i<15;i++) {
    frenchCup.innerHTML=i;
}

for(let i=0;i<10;i++) {
    leagueCup.innerHTML=i;
}

for(let i=0;i<12;i++) {
    championsTrophy.innerHTML=i;
}

for(let i=0;i<2;i++) {
    winnersCup.innerHTML=i;
}

function addToCart(id){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        alert('Article added to cart');
    }
    xhttp.open("GET", "index.php?page=cart&action=added&id=" +id);
    xhttp.send();
}

function logout() {
    const y = new XMLHttpRequest();
    y.onload = function() {
      alert("You have logged out!");
      window.location.href = 'index.php?page=starting';
    }
    y.open("GET", "index.php?page=login&action=logout");
    y.send();
  }