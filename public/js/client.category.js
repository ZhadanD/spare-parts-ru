function showSparePart(img, name, shortDesc, desc) {
    document.getElementById('spare-part-img').src = img
    document.querySelectorAll('.spare-part-name').forEach(el => {
        el.innerText = name
    })
    document.getElementById('spare-part-short-desc').innerText = shortDesc
    document.getElementById('spare-part-desc').innerText = desc
}
