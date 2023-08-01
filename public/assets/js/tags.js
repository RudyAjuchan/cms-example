const ul = document.getElementById("ulTag"),
input = document.getElementById("InputTags");
let tagsDefault = document.getElementById("tagsG").value;

if(tagsDefault!="" && tagsDefault!=null){
    tags = JSON.parse(tagsDefault);
    createTag();
}else{
    tags = [];
}

input.addEventListener("keyup", addTag);

function addTag(e){
    if(e.keyCode  == 32){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags.includes(tag)){            
            tag.split(',').forEach(tag => {
                tags.push(tag);
                createTag();
            });
        }
        e.target.value = "";
    }
}

function createTag(){
    if(tags!=null){
        ul.querySelectorAll("li").forEach(li => li.remove());
        tags.slice().reverse().forEach(tag =>{
            let liTag = `<li>${tag} <i class="fa-solid fa-circle-xmark" onclick="remove(this, '${tag}')"></i></li>`;
            ul.insertAdjacentHTML("afterbegin", liTag);
        });

        document.getElementById('tagsG').value=JSON.stringify(tags);
    }    
}

function remove(element, tag){
    let index  = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    document.getElementById('tagsG').value=JSON.stringify(tags);
}