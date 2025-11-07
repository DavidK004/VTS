objectTwo = {
    name: "Object Two",
    year: 2022,
    city: "Los Angeles",
    university: "Oxford",
    email: "example2@example.com"
}
const getName = obj => `Vrednost za ime je: ${obj.name}<br>`;
document.write(getName(objectTwo));
const getEmail = obj => `Vrednost za email je: ${obj.email}<br>`;
document.write(getEmail(objectTwo));
const getUniversity = obj => `Vrednost za univerzitet je: ${obj.university}<br>`;
document.write(getUniversity(objectTwo));