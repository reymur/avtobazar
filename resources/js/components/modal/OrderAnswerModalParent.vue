<template>
    <!-- Modal -->
    <div class="modal fade" :id="'answer-' + order.id" tabindex="-1" :aria-labelledby="'answer-' + order.id" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-sm">
          <div class="">

              <order-answer-modal
                  :order_id="order.id"
              ></order-answer-modal>

          </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrderAnswerModalParent",
    props: ['order']
}
</script>

<style scoped>

</style>
