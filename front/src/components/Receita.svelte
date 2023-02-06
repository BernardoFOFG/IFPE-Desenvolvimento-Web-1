<!-- Javascript -->
<script defer>
  import { onMount } from "svelte";
  let receitas = [];
  async function load() {
    const response = await fetch("http://localhost:8000/get-receitas.php", {
      credentials: "include",
    });
    if (!response.ok) {
      alert("Você não está logado!");
      return;
    }
    receitas = await response.json();
  }

  async function deleteReceita(id) {
    const data = new FormData();
    data.append("id", id);
    const deleteRece = "http://localhost:8000/delete-receita.php";

    let resposta = window.confirm(
      "Tem certeza que deseja excluir essa receita?"
    );
    if (resposta) {
      const res = await fetch(deleteRece, {
        method: "POST",
        body: data,
        credentials: "include",
      });

      if (!res.ok) {
        alert("Não foi possivel removar essa receita!");
        return;
      }
    }
    load();
  }
  onMount(() => {
    load();
  });
</script>

<!-- HTML -->
<div
  class="text-center mt-4 w-screen justify-center items-center flex flex-col"
>
  <h1 class="text-2xl font-semibold">
    Recomendamos que passe o mouse por cima da receita para melhor visualização!
  </h1>
  <!-- svelte-ignore a11y-click-events-have-key-events -->
  <p
    class="mt-4 text-2xl font-semibold text-white bg-orange-700 w-36 rounded-xl cursor-pointer hover:bg-orange-900 transition-all"
    on:click={() => load()}
  >
    Atualizar lista
  </p>
</div>
<div
  class="w-full h-full mx-auto px-8 grid grid-cols-2 pt-8 justify-center gap-y-2 gap-x-4 pb-4 justify-items-center overflow-x-hidden divide-gray-500 divide-x-2"
>
  {#each receitas as receita}
    <div
      class="rounded-lg flex flex-col w-[100%] h-96 p-5 transition-all hover:w-[90%] hover:h-[450px] ring-2 ring-black bg-white text-center items-center justify-evenly overflow-hidden"
      id={receita.RECEITA_ID}
    >
      <div class="flex justify-end w-full mr-4">
        <!-- svelte-ignore a11y-click-events-have-key-events -->
        <img
          src="https://icongr.am/material/cancel.svg?size=32&color=#FFF"
          alt="Apagar"
          class="cursor-pointer"
          on:click={() => deleteReceita(receita.RECEITA_ID)}
        />
      </div>
      <div>
        <h1 class="text-orange-600 font-extrabold text-lg">
          {receita.RECEITA_NOME}
        </h1>
        <p>
          {receita.RECEITA_DESCRICAO}
        </p>
      </div>
      <div>
        <div class="flex divide-gray-500 divide-x-2" id="conteudo-card">
          <div class="mr-4">
            <h2 class="text-orange-600 font-extrabold text-lg">Ingredientes</h2>
            <p class="text-justify underline">{receita.RECEITA_INGREDIENTES}</p>
          </div>
          <div class="">
            <h2 class="text-orange-600 font-extrabold text-lg ml-4">
              Modo de preparo
            </h2>
            <p class="text-justify underline gray ml-4">
              {receita.RECEITA_PREPARO}
            </p>
          </div>
        </div>
      </div>
    </div>
  {/each}
</div>
