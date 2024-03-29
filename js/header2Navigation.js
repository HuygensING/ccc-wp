let positionTimeline = () => {
  let tlBlock = document.getElementById('timelineBlock').outerHTML
  document.getElementById('timelineBlock').outerHTML = ''



  let contentElem = document.getElementById('ccc_main_content');
  let elems = contentElem.querySelectorAll('h2');

  // adb anchor link to each header
  for (var i = 0; i < elems.length; i++) {
    if ( (elems[i].innerHTML == 'Timeline') || (elems[i].innerHTML == '2. Timeline') ) {
      let div = document.createElement("div");
      div.innerHTML = tlBlock

      elems[i].after(div);
    }
  }

  document.getElementById('ltTemp').style.display = 'none';
}
positionTimeline()






header2Navigation('ccc_main_content', 'pageContentList', false);

function header2Navigation(contentId, navId, asList) {


  let preBlock = '<span class="ccc_pageContentLabel">Page content</span>';
  let postBlock = '';
  let preItem = '';
  let postItem = '';

  if (asList) {
    preBlock = '<ul>';
    postBlock = '</ul>';
    preItem = '<li>';
    postItem = '</li>';

  }


  let contentElem = document.getElementById(contentId);

  // get all headers 2 and 3.
  var elems = contentElem.querySelectorAll('h2,h3');
  console.log(elems);

  // adb anchor link to each header
  for (var i = 0; i < elems.length; i++) {
      //var hId = elems[i].getAttribute( 'id' );
      let hIdRaw = elems[i].innerHTML;
      let hId = hIdRaw.replace(/\s+/g, '_').toLowerCase()
      document.body.innerHTML = document.body.innerHTML.replace('<h2>'+hIdRaw, '<a id="l'+hId+'"></a><h2>'+hIdRaw);
  }


  // Generate a navigation list
  var headerNavigation = '';
  var linkClass = '';
  for (var i = 0; i < elems.length; i++) {
      linkClass = '';
      let hIdRaw = elems[i].innerHTML;
      let hId = hIdRaw.replace(/\s+/g, '_').toLowerCase()
      var hTxt = elems[i].innerText;
      var hTag = elems[i].tagName;

      // distinct subnav
      if (hTag == 'H3') {
        linkClass= 'subNav';
      }

      headerNavigation += preItem+'<a href="#l'+hId+'" class="'+linkClass+'">'+hTxt+'</a>'+postItem;
  }

  document.getElementById(navId).innerHTML += preBlock+headerNavigation+postBlock;
}
