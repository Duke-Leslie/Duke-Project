// Toggle colors of left section links
const link = document.querySelectorAll("#left a");
link.forEach((li) => {
    li.addEventListener('click', function(){
        link.forEach(i => i.parentElement.classList.remove("active"));
        this.parentElement.classList.add("active");
    });
});
