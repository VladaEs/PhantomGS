function getMethod(queryLink, link='api/database') { //queryLink start with '?'then property= value& ...
  return new Promise((resolve, reject) => {
    fetch(link + queryLink)
      .then(response => response.json())
      .then(data => {
        resolve(data); // Возвращаем данные через resolve
      })
      .catch(error => {
        reject(error); // Возвращаем ошибку через reject, если что-то пошло не так
      });
  });
}
function postMethod(body, link = 'api/database') {
  return new Promise((resolve, reject) => {
    fetch(link, {
      method: "POST",
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(body)
    })
    .then(response => response.json())
    .then(data => {
      resolve(data);
    })
    .catch(error => {
      reject(error);
    });
  });
}
function serviceRequest(){
  return new Promise((resolve, reject) => {
    fetch(link + queryLink)
      .then(response => response.json())
      .then(data => {
        resolve(data); // Возвращаем данные через resolve
      })
      .catch(error => {
        reject(error); // Возвращаем ошибку через reject, если что-то пошло не так
      });
  });
}
function postFormData(body, link = '/api/forms') {
  return new Promise((resolve, reject) => {
      fetch(link, {
              method: "POST",
              body: body
          })
          .then(response => {
              if (!response.ok) {
                  throw new Error('Network response was not ok');
              }
              return response.text();
          })
          .then(data => {
              resolve(data);
          })
          .catch(error => {
              reject(error);
          });
  });
}


function clearData(item) {
  let tempData = item.trim(); // Удаляем начальные и конечные пробелы
  tempData = tempData.replace(/<\/?[^>]+(>|$)/g, ""); // Удаляем HTML и PHP теги
  tempData = tempData.replace(/&/g, "&amp;") // Заменяем символ & на &amp;
                       .replace(/</g, "&lt;") // Заменяем символ < на &lt;
                       .replace(/>/g, "&gt;") // Заменяем символ > на &gt;
                       .replace(/"/g, "&quot;") // Заменяем символ " на &quot;
                       .replace(/'/g, "&#39;"); // Заменяем символ ' на &#39;

  return tempData;
}
