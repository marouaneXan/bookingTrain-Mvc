// Get a reference to the snow flake container



var c=2;


// Set up a click event handler for the document

function addPassager() {
  // Clone the first snow flake container and append the clone to the body
  const div = document.getElementById('passager');
    const clone = div.cloneNode(true);
   ///resert value
    
    clone.getElementsByTagName('input')[0].value="";
    clone.getElementsByTagName('input')[1].value="";
    clone.getElementsByTagName('input')[2].value="";
    clone.getElementsByTagName('input')[3].value="";
// change name input
    clone.getElementsByTagName('input')[0].setAttribute("name", "prenomP"+c);
    clone.getElementsByTagName('input')[1].setAttribute("name", "nomP"+c);
    clone.getElementsByTagName('input')[2].setAttribute("name", "emailP"+c);
    clone.getElementsByTagName('input')[3].setAttribute("name", "telP"+c);

    document.getElementById("submit").value=c;
    // clone.getElementsByTagName('input')[4].setAttribute("value", c);
    
    window['c']++;
  document.getElementById("a").appendChild(clone);
  

    //   document..appendChild(snowflake.cloneNode(true));
}