
  // JavaScript
  const tanggalElement = document.getElementById("tanggal");
  tanggalElement.addEventListener("change", function() {
    const tanggalValue = this.value;
    const date = new Date(tanggalValue);
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    const formattedDate = `${day}/${month}/${year}`;
    this.value = formattedDate;
  });
