let sparePart = {
    currentContent: '',
    name: '',
    short_desc: '',
    desc: '',
    status: '',
    category: '',
}

function deleteSparePart(sparePartName, sparePartId) {
    event.preventDefault()

    let decision = confirm('Вы точно хотите удалить запчасть \"' + sparePartName + '\"?')

    if (decision) document.getElementById(`delete-spare-part-${sparePartId}`).submit()
}

function changeContent(imgType, buttonsContent, disabled, close = false) {
    if (close) {
        document.getElementById('buttons-change-delete').innerHTML = buttonsContent
        document.getElementById('name').value = sparePart.name
        document.getElementById('short-desc').value = sparePart.short_desc
        document.getElementById('desc').value = sparePart.desc
        document.getElementById('img').value = null
        document.getElementById('label-img').style.setProperty('display', 'none')

        let statusInSelect = document.querySelector('#status')

        for (let i = 0; statusInSelect.options.item(i); i++) {
            if(statusInSelect.options.item(i).value === sparePart.status) {
                statusInSelect.selectedIndex = i
            }
        }

        let categoryInSelect = document.querySelector('#category')

        for (let i = 0; categoryInSelect.options.item(i); i++) {
            if(categoryInSelect.options.item(i).value === sparePart.category) {
                categoryInSelect.selectedIndex = i
            }
        }

        sparePart.currentContent = ''
        sparePart.name = ''
        sparePart.short_desc = ''
        sparePart.desc = ''
        sparePart.status = ''
        sparePart.category = ''
    } else {
        sparePart.currentContent = document.getElementById('buttons-change-delete').innerHTML
        sparePart.name = document.getElementById('name').value
        sparePart.short_desc = document.getElementById('short-desc').value
        sparePart.desc = document.getElementById('desc').value
        sparePart.status = document.getElementById('status').value
        sparePart.category = document.getElementById('category').value

        document.getElementById('buttons-change-delete').innerHTML = buttonsContent
        document.getElementById('label-img').style.removeProperty('display')
    }

    document.getElementById('img').type = imgType

    if(disabled) {
        document.getElementById('name').setAttribute('disabled',null)
        document.getElementById('short-desc').setAttribute('disabled', null)
        document.getElementById('desc').setAttribute('disabled', null)
        document.getElementById('status').setAttribute('disabled', null)
        document.getElementById('category').setAttribute('disabled', null)
    } else {
        document.getElementById('name').removeAttribute('disabled')
        document.getElementById('short-desc').removeAttribute('disabled')
        document.getElementById('desc').removeAttribute('disabled')
        document.getElementById('status').removeAttribute('disabled')
        document.getElementById('category').removeAttribute('disabled')
    }
}

function changeSparePart() {
    let buttons = `
        <button onclick="closeChangeSparePart()" type="button" class="btn btn-secondary m-2">Отменить</button>

        <button onclick="updateSparePart()" type="button" class="btn btn-warning m-2">Редактировать</button>
    `

    changeContent('file', buttons, false)
}

function closeChangeSparePart() {
    changeContent('hidden', sparePart.currentContent, true, true)
}

function updateSparePart() {
    document.getElementById('update-spare-part').submit()
}

function closeError(errorId) {
    document.getElementById(errorId).remove()
}
