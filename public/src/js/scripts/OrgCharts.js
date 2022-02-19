var orgChart;
orgChart = new OrgChart(document.getElementById("orgchart"), {
    enableSearch: false,
    mouseScrool: OrgChart.action.ctrlZoom,
    scaleInitial: 1.3,
    nodeBinding: {
        field_0: "name",
        field_1: "title",
        img_0: "img"
    },
    nodeMenu: {
        edit: { text: "Edit" },
        remove: { text: "Hapus" }
    },
    template: "isla"
});