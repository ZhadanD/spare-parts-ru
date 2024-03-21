function deleteSparePart(sparePartName, sparePartId) {
    event.preventDefault()

    let decision = confirm('Вы точно хотите удалить запчасть \"' + sparePartName + '\"?')

    if (decision) document.getElementById(`delete-spare-part-${sparePartId}`).submit()
}
