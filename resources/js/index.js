// elements

var elements_to_watch = document.querySelectorAll('.watch-index');
// callback 
var callback = function(items){
  items.forEach((item) => {
    if(item.isIntersecting){
      item.target.classList.add("in-page-index");
    } else{
      item.target.classList.remove("in-page-index");
    }
  });
}
// observer
var observer = new IntersectionObserver(callback, { threshold: 0 } );
// apply
elements_to_watch.forEach((element) => {
  observer.observe(element); 
});

