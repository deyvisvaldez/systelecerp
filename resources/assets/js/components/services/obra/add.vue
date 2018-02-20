<template>
  <p>
    <b-btn v-b-tooltip.hover title="Agregar Obra o Proyecto" variant="primary" size="sm" @click="showModal">
      <i class="material-icons">library_add</i>
    </b-btn>

    <b-modal ref="addObraModal" hide-footer title="Agregar Obra o Proyecto">
      <b-form @submit.stop.prevent="handleSubmit">
        <b-form-group label="Numero:">
            <b-form-input type="text"
                        placeholder="Ej: P00001"
                        v-model="obra.numero"></b-form-input>
            <div v-show="numeroValidate.isValid">
                <p class="text-danger"><small>{{ numeroValidate.text }}</small></p>
            </div>
        </b-form-group>

        <b-form-group label="Obra:">
            <b-form-input type="text"
                        placeholder="Ej: Descargador de barro Aysa"
                        v-model="obra.obra"></b-form-input>
            <div v-show="obraValidate.isValid">
                <p class="text-danger"><small>{{ obraValidate.text }}</small></p>
            </div>
        </b-form-group>
        

        <b-form-group label="Descripcion:">
            <b-form-input type="text"
                        placeholder="Ej: Automatizacion de sistema de descarga de barro"
                        v-model="obra.descripcion"></b-form-input>
        </b-form-group>

        <b-form-group label="Costo:">
            <b-form-input type="number"
                        placeholder="Ej: 1000000"
                        v-model="obra.costo"></b-form-input>
        </b-form-group>

        <b-form-group label="Tipo de moneda:">
            <b-form-input type="text"
                        placeholder="Ej: ARG"
                        v-model="obra.tipo_moneda"></b-form-input>
        </b-form-group>

        <b-form-group label="Forma de pago:">
            <b-form-input type="text"
                        placeholder="Ej: Efectivo"
                        v-model="obra.forma_pago"></b-form-input>
        </b-form-group>

        <b-form-group label="Fecha limite:">
            <b-form-input type="date"
                        placeholder="Ej: 01/01/2019"
                        v-model="obra.fecha_limite"></b-form-input>
        </b-form-group>

        <b-form-group label="Documentacion:">
            <b-form-input type="text"
                        placeholder="Ej: Nombre de documentos asociados y direccion del servidor"
                        v-model="obra.documentacion"></b-form-input>
            <div v-show="clienteValidate.isValid">
                <p class="text-danger"><small>{{ clienteValidate.text }}</small></p>
            </div>
        </b-form-group>

        <b-form-group label="Cliente:">
          <b-form-select v-model="obra.cliente_id" class="mb-3">
            <option :value="null">Seleccione un cliente</option>
            <template v-for="selectItem in selectItems">
            <option :value="selectItem.id" v-bind:key="selectItem.id">{{ selectItem.nombre }} - {{ selectItem.planta }}</option>
            </template> 
          </b-form-select>
        </b-form-group>

      </b-form>
      <b-btn variant="primary" @click="save()">Guardar</b-btn>
      <b-btn variant="danger" @click="hideModal()">Cerrar</b-btn>
    </b-modal>
  </p>
</template>

<script>
import swal from 'sweetalert2'
import { bus } from '../../../app.js'

export default {
  data () {
    return {
      url: 'http://localhost/systelecerp/public/api',
      formValidate: false,
      selectItems: [],
      cliente_id: [1],
      numeroValidate: {
          isValid: false,
          text: ''
      },
      obraValidate: {
          isValid: false,
          text: ''
      },
      clienteValidate: {
          isValid: false,
          text: ''
      },
      cliente: {
          nombre: '',
          planta: '',
          direccion: '',
          descripcion: ''
      },
      obra: {
          numero: '',
          obra: '',
          descripcion: '',
          costo: 0,
          tipo_moneda: '',
          forma_pago: '',
          fecha_limite: '',
          documentacion: '',
          estado: '',
          cliente_id: null
      }
    }
  },
  props: [
    'item'
  ],
  created () {
    this.cliente = this.item
    this.obra.cliente_id = this.item.id
    this.getSelectItems()
  },
  methods: {
    showModal () {
      this.$refs.addObraModal.show()
    },

    hideModal () {
      this.clear()
      this.$refs.addObraModal.hide()
    },

    alertError (error) {
      swal(
        'Registro fallido!',
        'Ocurrio un error al intentar guardar el registro en la base de datos. ' + error,
        'error'
      )
    },

    alertSuccess () {
      swal(
        'Registro exitoso!',
        'Se guardo con exito en la base de datos!',
        'success'
      )
    },

    clear () {
      this.obra.numero = ''
      this.obra.obra = ''
      this.obra.descripcion = ''
      this.obra.costo = 0
      this.obra.tipo_moneda = ''
      this.obra.forma_pago = ''
      this.obra.fecha_limite = ''
      this.obra.documentacion = ''
    },

    save () {
      if (this.obra.numero === '') {
        this.numeroValidate.isValid = true
        this.numeroValidate.text = 'Este campo es requerido'
      } else if (this.obra.obra === '' || this.obra.obra.length < 6) {
        this.obraValidate.isValid = true
        this.obraValidate.text = 'Este campo es requerido y necesita al menos 6 caracteres'
      } else if (this.obra.cliente_id === null) {
        this.obraValidate.isValid = true
        this.obraValidate.text = 'Este campo es requerido'
      } else {
        this.obraValidate.isValid = false
        this.obraValidate.text = ''
        this.formValidate = true
      }
      if (this.formValidate) {
        this.add()
      }
    },
    
    add () {
      this.$http.post(this.url + '/obra', this.obra)
      .then(response => {
        bus.$emit('items', response.data) 
        bus.$emit('subItems', response.data)
        this.hideModal()
        this.alertSuccess()
      }, response => {
        this.alertError()
      })
    },

    getSelectItems () {
      this.$http.get(this.url + '/cliente').then(response => {
        this.selectItems = response.data
      }, response => {
      })
    }
  }
}
</script>
