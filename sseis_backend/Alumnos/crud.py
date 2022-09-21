from sqlalchemy.orm import Session

from app.usuarios import models, schemas


def get_alumno_by_boleta(db: Session, boleta: str):
    return db.query(models.Alumnos).filter(models.Alumnos.Boleta == boleta).first()


def get_alumno_by_apellidos(db: Session, aPaterno: str, aMaterno: str):
    return db.query(models.Alumnos).filter(models.Alumnos.A_Paterno == aPaterno & models.Alumnos.A_Materno == aMaterno).first()


def create_incidencia(db: Session, incidencia: schemas.Incidencias):
    db_incidencia = models.Alumnos(
        folio = incidencia.folio_inc
        ciclo = incidencia.ciclo
        fecha = incidencia.fecha
        hora = incidencia.hora
        hecho = incidencia.hecho 
        citatorio = incidencia.citatorio
        quien_reporta = incidencia.quien_reporta
        observaciones = incidencia.observaciones )
    db.add(db_incidencia)
    db.commit()
    db.refresh(db_incidencia)
    return db_incidencia

def create_sancion(db: Session, sancion: schemas.Sanciones):
    db_sancion = models.Alumnos(
        folio = sancion.folio_san
        nivel = sancion.ciclo
        sancion1 = sancion.sancion
        fecha_reporte = sancion.fecha_reporte
        observacion = sancion.observacion 
        campo = sancion.campo
    )
    db.add(db_sancion)
    db.commit()
    db.refresh(db_sancion)
    return db_sancion

def add_credencial_olvidada(db: Session, cred_olv: schemas.Suma_CredOlv):
    #la neta no c cómo hacer esta para que se agregue uno más asi que x
    return 0

def create_credret(db: Session, retenida: schemas.Cred_Retenida):
    db_retenida = models.Alumnos(
        id = retenida.id_ret
        fecha_reg = retenida.fecha_reg
        motivo = retenida.motivo_ret
        observacion = retenida.observacion_ret
        fecha_entr = retenida.fecha_entrega
    )
    db.add(db_retenida)
    db.commit()
    db.refresh(db_retenida)
    return db_retenida

def create_sincred(db: Session, sin_cred: schemas.Sin_Credencial):
    db_sincred = models.Alumnos(
        id = sin_cred.id_sincr
        fecha_reg = sin_cred.fecha_solicitud
        motivo = sin_cred.motivo_sinc
        obs = sin_cred.observacion_sinc
        fecha_entr = sin_cred.fecha_entrega_sinc
    )
    db.add(db_sincred)
    db.commit()
    db.refresh(db_sincred)
    return db_sincred