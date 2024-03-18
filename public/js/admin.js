function deleteCategory(categoryName) {
    event.preventDefault()

    let decision = confirm('Вы точно хотите удалить категорию \"' + categoryName + '\"?')

    if (decision) document.getElementById('delete-category').submit()
}
