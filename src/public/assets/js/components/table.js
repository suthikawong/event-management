function tableCellElement(title, data) {
  return `
  <div class="card-content-container">
    <div class="card-content-title">${title}:</div>
    <div>${data}</div>
  </div>`
}

function tableImageCellElement(image) {
  return `
  <div class="table-image-container">
    <img class="table-image" src="${image}" alt="event image">
  </div>`
}
