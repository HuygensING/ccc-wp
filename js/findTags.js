function findInList(stringToFind, idOfResultList) {
  console.log('**',stringToFind, idOfResultList);

  let filterDisplayArr = []


  // Declare variables
  let input, filter, ul, li, a, i, txtValue;
  // input = document.getElementById('myInput');
  // filter = input.value.toUpperCase();

  let elements2Filter = document.querySelectorAll('#'+idOfResultList+' > *')



  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < elements2Filter.length; i++) {
    let showItems = false;
    let inner = elements2Filter[i].getElementsByClassName('tag')


    for (var j = 0; j < inner.length; j++) {
      txtValue = inner[j].innerHTML

      if (txtValue.toUpperCase().indexOf(stringToFind.toUpperCase()) > -1) {
        showItems = true;
      }

    }

    // hide items if found
    if (showItems) {
      elements2Filter[i].style.display = "";
    } else {
      elements2Filter[i].style.display = "none";
    }


  }
}


function clearList(idOfResultList) {
  let elements2Filter = document.querySelectorAll('#'+idOfResultList+' > *')
  for (i = 0; i < elements2Filter.length; i++) {
    elements2Filter[i].style.display = "";
    }
}



let createTageButtons = function (idOfResultList) {
  let tagNames = [];

  // find all the tags items
  let elements2Filter = document.getElementsByClassName('tag')
  //console.log( elements2Filter );
  for (i = 0; i < elements2Filter.length; i++) {
    tagNames.push(elements2Filter[i].innerHTML)
  }

  // get unique list of tags
  let uniqueTags = [...new Set(tagNames)];
  uniqueTags.sort()


  // create buttons
  if (uniqueTags.length > 0) {
    let output = 'Filter op <br>';
    uniqueTags.forEach(item => output+= '<button class="mButtonClean" onclick="findInList(\''+item+'\', \''+idOfResultList+'\')">'+item+'</button><br>');
    output+= '<br><button type="button" name="button" onclick="clearList(\''+idOfResultList+'\')"">Alle resultaten</button>';
    document.getElementById('filteronList').innerHTML =  output;
  }


}

function createFacetList(idOfResultList) {
  //console.log(facetData);

  let parentList = [];
  // get parents
  facetData.forEach((item, i) => {
    if (item.parentId == 0) {
      item.childList = [];
      parentList.push(item)
    }

  });

  // get children
  facetData.forEach((allItems, i) => {
    parentList.forEach((parentItem, p) => {
      if ( allItems.parentId == parentItem.id)  {
        parentList[p].childList.push(allItems)
      }
    });
  });

  // generate facets
  let out = ''
  parentList.forEach((parentItem, p) => {
    out += '<div><strong>'+parentItem.name+'</strong>'
    out += '<ul>'
    parentItem.childList.forEach((cItem, c) => {
      out += '<li>'
      out +='<button class="" onclick="findInList(\''+cItem.name+'\', \''+idOfResultList+'\')">'+cItem.name+'</button>'
      out += '</li>'
      });
      //out += '<button type="button" name="button" onclick="clearList(\''+idOfResultList+'\')"">All results</button>'
    out += '</ul></div>'
  });




  //console.log(parentList);
  document.getElementById('optionBox').innerHTML =  out;
}

createFacetList('ccc_vignette_cards');
//createTageButtons('main');
