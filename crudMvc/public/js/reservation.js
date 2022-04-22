// Get a reference to the snow flake container



var c=2;


// Set up a click event handler for the document

function addPassager(nbr) {
  // Clone the first snow flake container and append the clone to the body
  const div = document.getElementById('passager');
    const clone = div.cloneNode(true);
   ///resert value
   for (let i = 2; i<= nbr; i++) {

    const div = document.getElementById('passager');
    const clone = div.cloneNode(true);
    clone.getElementsByTagName('input')[0].value="";
    clone.getElementsByTagName('input')[1].value="";
    clone.getElementsByTagName('input')[2].value="";
    clone.getElementsByTagName('input')[3].value="";
    clone.getElementsByTagName('h5')[0].innerHTML="passager "+i;
// change name input
    clone.getElementsByTagName('input')[0].setAttribute("name", "prenomP"+i);
    clone.getElementsByTagName('input')[1].setAttribute("name", "nomP"+i);
    clone.getElementsByTagName('input')[2].setAttribute("name", "emailP"+i);
    clone.getElementsByTagName('input')[3].setAttribute("name", "telP"+i);

    document.getElementById("submit").value=nbr;
    // clone.getElementsByTagName('input')[4].setAttribute("value", c);
    
    // window['c']++;    

    document.getElementById("a").appendChild(clone);
    
  }
    
  

    //   document..appendChild(snowflake.cloneNode(true));
}