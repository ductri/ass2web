function clickS1(){
  var keyW = $('#keywordInput').val();
  if (keyW != undefined && keyW != null) {
      window.location = '/search?keyword=' + keyW;
  }
}