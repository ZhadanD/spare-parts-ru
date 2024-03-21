function deleteCategory(categoryName, categoryId) {
    event.preventDefault()

    let decision = confirm(`Вы точно хотите удалить категорию "${categoryName}"?\nВсе товары, принадлежащие этой категории, будут откреплены.`)

    if (decision) document.getElementById(`delete-category-${categoryId}`).submit()
}
