from fastapi import APIRouter, Depends, HTTPException
from sqlalchemy.orm import Session
from Alumnos import crud, models, schemas
from sseis_backend.database import SessionLocal, engine

models.Base.metadata.create_all(bind=engine)

router = APIRouter(
    tags=["Alumnos"]
)

# Dependencies
def get_db():
    db = SessionLocal()
    
    try:
        yield db
    finally:
        db.close()

