function loadFile(file) {
    console.log("chegou aqui")
    let text = await file.text();
    document.getElementById('output').textContent = text;
}