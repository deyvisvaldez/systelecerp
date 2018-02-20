<template>
  <b-container>
    <!-- User Interface controls -->
    <b-row>
      <b-col md="6" class="my-1">
        <b-form-group horizontal label="Filtro" class="mb-0">
          <b-input-group>
            <b-form-input v-model="filter" placeholder="Que estas buscando?" />
            <b-btn :disabled="!filter" @click="filter = ''">Limpiar</b-btn>
          </b-input-group>
        </b-form-group>
      </b-col>
      <b-col md="6" class="my-1">
        <b-form-group horizontal label="Elementos" class="mb-0">
          <b-form-select :options="pageOptions" v-model="perPage" />
        </b-form-group>
      </b-col>
      <b-col md="6" class="my-1">
        <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0" />
      </b-col>
    </b-row>

    <!-- Main table element -->
    <b-table show-empty
             stacked="md"
             :items="items"
             :fields="fields"
             :current-page="currentPage"
             :per-page="perPage"
             :filter="filter"
             :sort-by.sync="sortBy"
             :sort-desc.sync="sortDesc"
             @filtered="onFiltered"
    >
      <template slot="operacion" slot-scope="row">
        <div class="row">
          <p>
            <b-btn variant="link" size="sm" @click.stop="row.toggleDetails">
              <i class="material-icons">{{ row.detailsShowing ? 'expand_less' : 'expand_more' }}</i>
            </b-btn>
          </p>
        <editcliente :item="row.item"></editcliente>
        <removecliente :item="row.item"></removecliente>
        </div>
      </template>
      <template slot="row-details" slot-scope="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value}}</li>
          </ul>
        </b-card>
      </template>
    </b-table>
  </b-container>
</template>

<script>
import swal from 'sweetalert2'
import { bus } from '../../../app.js'

const items = []

export default {
  data () {
    return {
      url: 'http://localhost/systelecerp/public/api',
      cliente: [],
      clientes: [],
      items: [],
      fields: [
        { key: 'nombre', label: 'Nombre', sortable: true },
        { key: 'planta', label: 'Planta' },
        { key: 'direccion', label: 'Direccion' },
        { key: 'descripcion', label: 'Descripcion' },
        { key: 'operacion', label: 'Operaciones' }
      ],
      buttonEditCliente: {
        type: 'buttonIcon',
        text: 'Editar',
        size: 'sm',
        variant: 'primary',
        icon: 'edit'
      },
      currentPage: 1,
      perPage: 5,
      totalRows: items.length,
      pageOptions: [ 5, 10, 15 ],
      sortBy: null,
      sortDesc: false,
      filter: null
    }
  },
  created () {
    this.getItems()
    bus.$on('items', (items) => {
      this.getItems()
    })
  },
  computed: {
    sortOptions () {
      // Create an options list from our fields
      return this.fields
        .filter(f => f.sortable)
        .map(f => { return { text: f.label, value: f.key } })
    }
  },
  methods: {
    onFiltered (filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length
      this.currentPage = 1
    },

    getItems () {
      this.$http.get(this.url + '/cliente').then(response => {
        this.items = response.data
      }, response => {
      })
    }
  }
}
</script>
