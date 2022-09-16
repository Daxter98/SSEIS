from sqlalchemy.orm import Session

from app.usuarios import models, schemas


def get_alumno_by_boleta(db: Session, boleta: str):
    return db.query(models.Alumnos).filter(models.Alumnos.Boleta == boleta).first()


def get_alumno_by_apellidos(db: Session, aPaterno: str, aMaterno: str):
    return db.query(models.Alumnos).filter(models.Alumnos.A_Paterno == aPaterno & models.Alumnos.A_Materno == aMaterno).first()


def create_incidencia(db: Session, incidencia: schemas.IncidenciaCreate):
#    db_usuario = models.Alumnos(
#        usuario=usuario.usuario,
#        nombre=usuario.nombre,
#        aPaterno = usuario.aPaterno,
#        aMaterno = usuario.aMaterno)
#    db.add(db_usuario)
#    db.commit()
#   db.refresh(db_usuario)
    return db_incidencia

def create_sancion(db: Session, sancion: schemas.SancionCreate):
    return db_sancion

def add_credencial_olvidada(db: Session, cred_olv: schemas.Suma_CredOlv):
    return 0

def create_credret(db: Session, retenida: schemas.Cred_RetCreate):
    return db_retenida

def create_sincred(db: Session, sin_cred: schemas.Sin_CredCreate):
    return db_sincred