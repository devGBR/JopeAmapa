<template>
  <v-table height="340px" fixed-header>
    <thead>
      <tr>
        <th class="text-center">
          TAREFA
        </th>
        <th class="text-center">
          DEPARTAMENTO
        </th>
        <th class="text-center">
          DATA FINAL
        </th>
        <th class="text-center">
          DESCRIÇÃO
        </th>
        <th class="text-center">
          STATUS
        </th>
        <th class="text-center">
          AÇÕES
        </th>

      </tr>
    </thead>
    <tbody>
      <tr v-for="item in task" :key="item.name">
        <td class="text-center">{{ item.tarefa }}</td>
        <td class="text-center">{{ item.ministerio }}</td>
        <td class="text-center">{{
        item.vencimento.split('-').reverse().join('/') }}</td>
        <td class="text-center pa-0">
          <v-tooltip location="top" :text="item.descricao">
            <template v-slot:activator="{ props }">
              <v-icon v-bind="props" color="green" icon="mdi-information-variant-circle-outline">

              </v-icon>
            </template>
          </v-tooltip>

        </td>
        <td class="text-center"><v-chip class="ma-2"
            :color="item.status === 'Completo' ? 'green' : item.status === 'Em andamento' ? 'orange' : 'grey'"
            text-color="white">
            {{ item.status }}
          </v-chip></td>
        <td class="text-center d-flex justify-center gap-1">
          <v-dialog transition="dialog-bottom-transition"  width="auto">
            <template v-slot:activator="{ props: activatorProps }">
              <v-btn v-bind="activatorProps" icon="mdi-eye" color="green" variant="plain"></v-btn>
            </template>

            <template v-slot:default="{ isActive }" style="position: relative;">
              <v-btn color="#529606" dark class="text-white"
                style="position: absolute; top: 0px; right: -10px; z-index: 5;" icon="mdi-close"
                @click="isActive.value = false">
              </v-btn>
              <v-card class="mx-auto my-5"
                style="width: auto; min-width: 364px; max-width: 400px; background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); color: white;">

                <v-card-title class="justify-space-between">
                  <div>
                    <v-icon large left>mdi-briefcase-outline</v-icon>
                    <span class="headline mx-2">Tarefa</span>
                  </div>
                  <v-chip class="ma-2"
                    :color="item.status === 'Completo' ? 'green' : item.status === 'Em andamento' ? 'orange' : 'grey'"
                    text-color="white">
                    {{ item.status }}
                  </v-chip>
                </v-card-title>

                <v-card-text>
                  <div class="my-2 mt-0">
                    <h3 class="text-h5 ">Descrição</h3>
                    <p>{{ item.descricao }}</p>
                  </div>
                  <div class="my-2">
                    <h3 class="text-h5 ">Departamento</h3>
                    <p>{{ item.ministerio }}</p>
                  </div>
                </v-card-text>

                <div class="w-100 d-flex  pa-2 ">
                  <div class="w-50 d-flex align-center">

                  </div>
                  <div class="w-50 d-flex justify-end">
                    <div class="text-truncate d-flex align-center">
                      <v-icon icon="mdi-calendar-multiselect" start></v-icon>
                      <p>{{
        item.vencimento.split('-').reverse().join('/')
                        }}
                      </p>
                    </div>
                  </div>

                </div>

              </v-card>

            </template>
          </v-dialog>
        </td>
      </tr>
    </tbody>
  </v-table>
</template>

<script>

export default {
  props: {
    task: Array
  },
  data: () => ({
    itemsPerPage: 5,
    serverItems: [],
    loading: true,
    totalItems: 0,
  }),
  methods: {
    loadItems({ page, itemsPerPage, sortBy }) {
      this.loading = true
      FakeAPI.fetch({ page, itemsPerPage, sortBy }).then(({ items, total }) => {
        this.serverItems = items
        this.totalItems = total
        this.loading = false
      })
    },
  },
}
</script>