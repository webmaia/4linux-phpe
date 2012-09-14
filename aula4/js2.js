var pessoa = {nome: "Alberto", sobrenome: "Roberto", idade: 25};
for (x in pessoa) {
    document.write(pessoa[x] + " ");
}
var pessoa = ["Alberto", "Roberto", 25];
var outrapessoa = new Array();
outrapessoa["nome"] = "Alberta";
alert(outrapessoa["nome"]);