<template>
  <b-container>
    <!-- User Interface controls -->
    <b-row>
      <b-col md="6" class="my-1">
        <b-form-group horizontal label="Filtro:" class="mb-0">
          <b-input-group>
            <b-form-input v-model="filter" placeholder="Que estas buscando?" />
            <b-btn :disabled="!filter" @click="filter = ''">Limpiar</b-btn>
          </b-input-group>
        </b-form-group>
      </b-col>
      <b-col md="6" class="my-1">
        <b-form-group horizontal label="Elementos:" class="mb-0">
          <b-form-select :options="pageOptions" v-model="perPage" />
        </b-form-group>
      </b-col>
      <b-col md="6" class="my-1">
        <b-button-group label="Elementos:" >
          <b-button v-b-tooltip.hover title="Contactos" variant="success" @click="changesubItemSelect('contacto')">
            <i class="material-icons">perm_contact_calendar</i>
          </b-button>
          <b-button v-b-tooltip.hover title="Obras" variant="info" @click="changesubItemSelect('obra')">
            <i class="material-icons">event_note</i>
          </b-button>
          <b-button v-b-tooltip.hover title="Ordenes de compra Clientes" variant="primary" @click="changesubItemSelect('orden_compra_cliente')">
            <i class="material-icons">shopping_cart</i>
          </b-button>
        </b-button-group>
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
        <template v-if="subItemSelect === 'contacto'">
          <addcontacto :item="row.item"></addcontacto>
        </template>
        <template v-if="subItemSelect === 'obra'">
          <addobra :item="row.item"></addobra>
        </template>
        <template v-if="subItemSelect === 'orden_compra_cliente'">

        </template>
        </div>
      </template>
      <template slot="row-details" slot-scope="row">
        <b-card>
          <template v-for="subItem in subItems" v-if="row.item.id === subItem.cliente_id">
            <ul v-bind:key="subItem.id">
              <template v-if="subItemSelect === 'contacto'">
                <li><strong>Nombre: </strong>{{ subItem.nombre }}</li>
                <li><strong>Puesto: </strong>{{ subItem.puesto }}</li>
                <li><strong>Email: </strong>{{ subItem.email }}</li>
                <li><strong>Telefono: </strong>{{ subItem.telefono }}</li>
                <li><strong>Celular: </strong>{{ subItem.celular }}</li>
                <div class="row">
                <editcontacto :subItem="subItem"></editcontacto>
                <removecontacto :subItem="subItem"></removecontacto>
                </div>
              </template>
              <template v-if="subItemSelect === 'obra'">
                <li><strong>Numero: </strong>{{ subItem.numero }}</li>
                <li><strong>Obra: </strong>{{ subItem.obra }}</li>
                <li><strong>Descripcion: </strong>{{ subItem.descripcion }}</li>
                <li><strong>Costo: </strong>{{ subItem.costo }}</li>
                <li><strong>Fecha limite: </strong>{{ subItem.fecha_limite }}</li>
                <div class="row">
                <editobra :item="subItem"></editobra>
                <removeobra :item="subItem"></removeobra>
                </div>
              </template>
              <template v-if="subItemSelect === 'orden_compra_cliente'">

              </template>
            </ul>
          </template>
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
      subItems: [],
      subItem: [],
      subItemSelect: 'contacto',
      fields: [
        { key: 'nombre', label: 'Nombre', sortable: true },
        { key: 'planta', label: 'Planta' },
        { key: 'direccion', label: 'Direccion' },
        { key: 'descripcion', label: 'Descripcion' },
        { key: 'operacion', label: 'Operaciones' }
      ],
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
    this.getSubItems()
    bus.$on('items', (items) => {
      this.getItems()
    })
    bus.$on('subItems', (SubItems) => {
      this.getSubItems()
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

    changesubItemSelect (subItemSelect) {
      this.subItemSelect = subItemSelect
      this.getSubItems()
    },

    getItems () {  
      this.$http.get(this.url + '/cliente').then(response => {
        this.items = response.data
      }, response => {
      })
    },

    getSubItems () {
      this.$http.get(this.url + '/' + this.subItemSelect).then(response => {
        this.subItems = response.data
      }, response => {
      })
    }
  }
}
</script>
