export function mask(){
  $(document).ready(function () {
    $("#documento").mask("000.000.000-00");
    $("#telefone").mask("(00) 0 0000-0000");
    $("#cep").mask("00000-000");
    $("#uf").mask("AA");
  });
};