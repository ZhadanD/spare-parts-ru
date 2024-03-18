let category = {
    currentContent: '',
    name: '',
    short_desc: '',
    desc: '',
}

function deleteCategory(categoryName, categoryId) {
    event.preventDefault()

    let decision = confirm('Вы точно хотите удалить категорию \"' + categoryName + '\"?')

    if (decision) document.getElementById(`delete-category-${categoryId}`).submit()
}

function changeContent(imgType, buttonsContent, disabled, close = false) {
    if (close) {
        document.getElementById('buttons-change-delete').innerHTML = buttonsContent
        document.getElementById('name').value = category.name
        document.getElementById('short-desc').value = category.short_desc
        document.getElementById('desc').value = category.desc
        document.getElementById('img').value = null
        document.getElementById('label-img').style.setProperty('display', 'none')

        category.currentContent = ''
        category.name = ''
        category.short_desc = ''
        category.desc = ''
    } else {
        category.currentContent = document.getElementById('buttons-change-delete').innerHTML
        category.name = document.getElementById('name').value
        category.short_desc = document.getElementById('short-desc').value
        category.desc = document.getElementById('desc').value

        document.getElementById('buttons-change-delete').innerHTML = buttonsContent
        document.getElementById('label-img').style.removeProperty('display')
    }

    document.getElementById('img').type = imgType

    if(disabled) {
        document.getElementById('name').setAttribute('disabled',null)
        document.getElementById('short-desc').setAttribute('disabled', null)
        document.getElementById('desc').setAttribute('disabled', null)
    } else {
        document.getElementById('name').removeAttribute('disabled')
        document.getElementById('short-desc').removeAttribute('disabled')
        document.getElementById('desc').removeAttribute('disabled')
    }
}

function changeCategory() {
    let buttons = `
        <button onclick="closeChangeCategory()" type="button" class="btn btn-secondary m-2">Отменить</button>

        <button type="button" class="btn btn-warning m-2">Редактировать</button>
    `

    changeContent('file', buttons, false)
}

function closeChangeCategory() {
    changeContent('hidden', category.currentContent, true, true)
}
