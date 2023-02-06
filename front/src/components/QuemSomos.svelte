<!-- Javascript -->
<script>
  import Cartola from "../../public/cartola.png";
</script>

<!-- HTML -->

<div
  class="text-white font-medium text-xl w-[25%] flex flex-col items-center justify-center"
>
  <p class="text-justify">
    Somos basicamente uma plataforma de divulgação aberta sobre receitas
    exclusivamente de laranja. Então aqui você achará com certeza alguma receita
    que na sua composição levará laranja para ser preparado, e para que nossa
    comunidade continue e tenhamos mais receitas sendo compartilhadas contamos
    com a sua atividade na nossa aplicação para ajudar outros futuros clientes!
  </p>
  <div class="mt-4 flex flex-col gap-4">
    <h2>Siga-nos nas nossas plataformas</h2>
    <ul class="flex items-center justify-between">
      <!-- svelte-ignore a11y-invalid-attribute -->
      <!-- svelte-ignore a11y-missing-attribute -->
      <li><a href="#"><img src={Cartola} class="w-16" /></a></li>
      <!-- svelte-ignore a11y-invalid-attribute -->
      <!-- svelte-ignore a11y-missing-attribute -->
      <li>
        <a href="#"
          ><img
            src="https://icongr.am/material/instagram.svg?size=64&color=FFFFFF"
            class="w-16"
          /></a
        >
      </li>
      <!-- svelte-ignore a11y-invalid-attribute -->
      <!-- svelte-ignore a11y-missing-attribute -->
      <li>
        <a href="#"
          ><img
            src="https://icongr.am/material/whatsapp.svg?size=64&color=ffffff"
            class="w-16"
          /></a
        >
      </li>
    </ul>
  </div>
</div>
