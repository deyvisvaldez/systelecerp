<template>
  <p>
    <b-btn v-b-tooltip.hover title="Agregar Presupuesto" variant="primary" size="sm" @click="showModal">
      <i class="material-icons">library_add</i>
    </b-btn>

    <b-modal ref="addPresupuestoModal" hide-footer title="Agregar Presupuesto">
      <b-form @submit.stop.prevent="handleSubmit">
        <b-form-group label="Numero:">
            <b-form-input type="text"
                        placeholder="Ej: P00001"
                        v-model="presupuesto.numero"></b-form-input>
            <div v-show="numeroValidate.isValid">
                <p class="text-danger"><small>{{ numeroValidate.text }}</small></p>
            </div>
        </b-form-group>

        <b-form-group label="Descripcion:">
            <b-form-input type="text"
                        placeholder="Ej: presupuesto de instalacion ...."
                        v-model="presupuesto.descripcion"></b-form-input>
        </b-form-group>
        

        <b-form-group label="Usuario:">
            <b-form-input type="text"
                        placeholder="Ej: Usuario que realiza la Presupuesto"
                        v-model="presupuesto.usuario"></b-form-input>
            <div v-show="usuarioValidate.isValid">
                <p class="text-danger"><small>{{ usuarioValidate.text }}</small></p>
            </div>
        </b-form-group>

        <b-form-group label="Estado:">
            <b-form-input type="text"
                        placeholder="Ej: ARG"
                        v-model="presupuesto.estado"></b-form-input>
        </b-form-group>

        <b-form-group label="Obra:">
          <b-form-select v-model="presupuesto.obra_id" class="mb-3">
            <option :value="null">Seleccione una obra</option>
            <template v-for="selectItem in selectItems">
            <option :value="selectItem.id" v-bind:key="selectItem.id">{{ selectItem.numero }} - {{ selectItem.obra }}</option>
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
      fields: [
        { key: 'numero', label: 'Numero', sortable: true },
        { key: 'obra', label: 'Obra' }
      ],
      numeroValidate: {
          isValid: false,
          text: ''
      },
      obraValidate: {
          isValid: false,
          text: ''
      },
      usuarioValidate: {
          isValid: false,
          text: ''
      },
      presupuesto: {
          id: null,
          numero: '',
          descripcion: '',
          usuario: '',
          estado: '',
          obra_id: null
      },
      obra: {
          id: null,
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
    this.obra = this.item
    this.presupuesto.obra_id = this.item.id
    this.getSelectItems()
  },
  methods: {
    showModal () {
      this.$refs.addPresupuestoModal.show()
    },

    hideModal () {
      this.clear()
      this.$refs.addPresupuestoModal.hide()
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
      this.presupuesto.numero = ''
      this.presupuesto.descripcion = ''
      this.presupuesto.usuario = ''
      this.presupuesto.estado = ''
    },

    save () {
      if (this.presupuesto.numero === '') {
        this.numeroValidate.isValid = true
        this.numeroValidate.text = 'Este campo es requerido'
      } else if (this.presupuesto.usuario === '' || this.presupuesto.usuario.length < 3) {
        this.usuarioValidate.isValid = true
        this.usuarioValidate.text = 'Este campo es requerido y necesita al menos 3 caracteres'
      } else if (this.presupuesto.obra_id === null) {
        this.obraValidate.isValid = true
        this.obraValidate.text = 'Este campo es requerido'
      } else {
        this.obraValidate.isValid = false
        this.usuarioValidate.isValid = false
        this.obraValidate.isValid = false
        this.numeroValidate.text = ''
        this.usuarioValidate.text = ''
        this.obraValidate.text = ''
        this.formValidate = true
      }
      if (this.formValidate) {
        this.add()
      }
    },
    
    add () {
      this.$http.post(this.url + '/presupuesto', this.presupuesto)
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
      this.$http.get(this.url + '/obra').then(response => {
        this.selectItems = response.data
      }, response => {
      })
    }
  }
}
</script>
